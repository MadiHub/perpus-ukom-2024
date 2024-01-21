<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['id_peminjaman', 'id_member', 'id_buku', 'tanggal_peminjaman','tanggal_pengembalian', 'status_peminjaman'];

    public function dapatkan_peminjaman($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email]);
        }
    }

    public function tambah_peminjaman($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function buku_dipinjam_by_member($id_member)
    {
        $query = $this->db->table('tb_peminjaman');
        $result = $query->select('*')
            ->join('tb_member', 'tb_member.id_member = tb_peminjaman.id_member')
            ->join('tb_buku', 'tb_buku.id_buku = tb_peminjaman.id_buku')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = tb_buku.id_kategori_buku')
            ->where('tb_peminjaman.id_member', $id_member)
            ->get()
            ->getResultArray();
    
        return $result;
    }

    public function cek_buku_dipinjam($id_member, $id_buku)
    {
        return $this->where('id_member', $id_member)
                    ->where('id_buku', $id_buku)
                    ->where('status_peminjaman', 'di-pinjam')
                    ->countAllResults() > 0;
    }
    
    
    
}