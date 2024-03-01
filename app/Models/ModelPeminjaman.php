<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['id_peminjaman', 'id_member', 'id_buku', 'tanggal_peminjaman','tanggal_pengembalian', 'status_peminjaman', 'total_pinjam', 'total_pengembalian'];

    public function dapatkan_peminjaman($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email]);
        }
    }

    public function dapatkan_peminjaman_byId($id_peminjaman = false)
    {
        if ($id_peminjaman === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_peminjaman' => $id_peminjaman]);
        }
    }

    // query untuk method proses_pinjam_buku
    public function tambah_peminjaman($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    // query untuk method buku_dipinjam
    public function buku_dipinjam_by_member($id_member)
    {
        $query = $this->db->table('tb_peminjaman');
        $result = $query->select('*')
            ->join('tb_member', 'tb_member.id_member = tb_peminjaman.id_member')
            ->join('tb_buku', 'tb_buku.id_buku = tb_peminjaman.id_buku')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = tb_buku.id_kategori_buku')
            ->where('tb_peminjaman.id_member', $id_member)
            ->where('status_peminjaman', 'di-pinjam')
            ->get()
            ->getResultArray();
    
        return $result;
    }

    // query untuk method proses_pinjam_buku
    // public function cek_buku_dipinjam($id_member, $id_buku)
    // {
    //     return $this->where('id_member', $id_member)
    //                 ->where('id_buku', $id_buku)
    //                 ->where('status_peminjaman', 'di-pinjam')
    //                 ->countAllResults() > 0;
    // }
    
    public function cek_buku_dipinjam($id_member, $id_buku, $tanggal_peminjaman, $tanggal_pengembalian)
    {
        return $this->where('id_member', $id_member)
                    ->where('id_buku', $id_buku)
                    ->where('tanggal_peminjaman', $tanggal_peminjaman)
                    ->where('tanggal_pengembalian', $tanggal_pengembalian)
                    ->where('status_peminjaman', 'di-pinjam')
                    ->get()
                    ->getRow();
    }
    
    
    // query untuk method daftar_peminjam
    public function getAllStatusDipinjam()
    {
        return $this->select('tb_peminjaman.*, tb_member.*, tb_buku.*, tb_kategori_buku.nama_kategori_buku')
            ->join('tb_member', 'tb_member.id_member = tb_peminjaman.id_member')
            ->join('tb_buku', 'tb_buku.id_buku = tb_peminjaman.id_buku')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = tb_buku.id_kategori_buku')
            ->where('status_peminjaman', 'di-pinjam')
            ->orderBy('tanggal_peminjaman', 'DESC') // Urutan tanggal terbaru (DESC)
            ->get()
            ->getResultArray();
    }

    // query untuk method daftar_pengembalian
    public function getAllStatusDikembalikan()
    {
        return $this->select('tb_peminjaman.*, tb_member.*, tb_buku.*')
        ->join('tb_member', 'tb_member.id_member = tb_peminjaman.id_member')
        ->join('tb_buku', 'tb_buku.id_buku = tb_peminjaman.id_buku')
        ->where('status_peminjaman', 'di-kembalikan')
        ->orderBy('tanggal_pengembalian', 'DESC') // Urutan tanggal terbaru (DESC)
        ->get()
        ->getResultArray();
    }

    // query untuk method proses_edit_peminjaman
    public function edit_status_peminjaman($data, $id_peminjaman)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_peminjaman', $id_peminjaman);
        return $builder->update($data);
    }
    
    public function cetak_peminjaman($status_peminjaman)
    {
        return $this->select('tb_peminjaman.*, tb_member.*, tb_buku.*')
            ->join('tb_member', 'tb_member.id_member = tb_peminjaman.id_member')
            ->join('tb_buku', 'tb_buku.id_buku = tb_peminjaman.id_buku')
            ->where('status_peminjaman', $status_peminjaman)
            ->orderBy('tanggal_peminjaman', 'DESC') // Urutan tanggal terbaru (DESC)
            ->get()
            ->getResultArray();
    }
 
    public function edit_total_pinjam($total_pinjam_baru, $id_buku, $id_member, $tanggal_peminjaman_lama, $tanggal_pengembalian_lama)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_buku', $id_buku);
        $builder->where('id_member', $id_member);
        $builder->where('tanggal_peminjaman', $tanggal_peminjaman_lama);
        $builder->where('tanggal_pengembalian', $tanggal_pengembalian_lama);
        return $builder->update($total_pinjam_baru);
    }



    public function total_peminjaman()
    {
        $currentMonth = date('m'); // Mendapatkan bulan saat ini

        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_peminjaman) as total_peminjaman')
            ->where("DATE_FORMAT(tanggal_peminjaman, '%m')", $currentMonth)
            ->where('status_peminjaman', 'di-pinjam')
            ->get();

        return $query->getRow();
    }
}