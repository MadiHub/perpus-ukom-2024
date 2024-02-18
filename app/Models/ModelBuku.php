<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table = 'tb_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['id_buku','id_kategori_buku', 'id_sub_kategori', 'judul', 'penulis', 'penerbit', 'tahun_terbit', 'stok', 'sampul_buku'];

    // KODE ID OTOMATIS
    public function kode_buku() {
        $query = $this->db->table('tb_buku');
        $count = $query->countAllResults();
    
        if ($count == 0) {
            return 'KT-001'; // Jika tidak ada data, beri nomor otomatis pertama
        } else {
            // Ambil nomor otomatis terkecil yang belum digunakan
            $usedCodes = $query->select('id_buku')->get()->getResultArray();
            $existingNumbers = array_map(function ($code) {
                return (int)substr($code['id_buku'], strlen('BK-'));
            }, $usedCodes);
    
            $newNumber = min(array_diff(range(1, $count + 1), $existingNumbers));
    
            $newCode = 'BK-' . sprintf("%03d", $newNumber);
    
            return $newCode;
        }
    }
    
    public function tambah_buku($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function semua_buku()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = '.$this->table.'.id_kategori_buku', 'left')
            ->join('tb_sub_kategori', 'tb_sub_kategori.id_sub_kategori = '.$this->table.'.id_sub_kategori', 'left')
            ->orderBy('id_buku', 'ASC') 
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function cari_buku($cari_buku)
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = ' . $this->table . '.id_kategori_buku', 'left')
            ->join('tb_sub_kategori', 'tb_sub_kategori.id_sub_kategori = ' . $this->table . '.id_sub_kategori', 'left')
            ->like('judul', $cari_buku) 
            ->orLike('tb_kategori_buku.nama_kategori_buku', $cari_buku)
            ->orderBy('id_buku', 'ASC')
            ->get()
            ->getResultArray();
        return $batasan;
    }
    
    public function getBukuByKategori($id_kategori_buku)
    {
        $query = $this->db->table($this->table);
        $buku = $query->select('*')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = '.$this->table.'.id_kategori_buku', 'left')
            ->join('tb_sub_kategori', 'tb_sub_kategori.id_sub_kategori = '.$this->table.'.id_sub_kategori', 'left')
            ->where('tb_kategori_buku.id_kategori_buku', $id_kategori_buku) // Menambahkan klausul WHERE
            ->orderBy('id_buku', 'ASC') 
            ->get()
            ->getResultArray();
        return $buku;
    }

    public function dapatkan_buku($id_buku = false)
    {
        $this->select('*');
        $this->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = '.$this->table.'.id_kategori_buku');

        if ($id_buku === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_buku' => $id_buku])->getRow();
        }
    }

    public function edit_buku($data, $id_buku)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_buku', $id_buku);
        return $builder->update($data);
    }

    public function edit_buku_dipinjam($id_buku, $stok_baru)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_buku', $id_buku);
        
        $builder->update(['stok' => $stok_baru]);
                
        return $this->db->affectedRows(); 
    }

    public function hapus_buku($id_buku)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_buku' => $id_buku]);
    }

    public function total_buku()
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_buku) as total_buku')
            ->get();

        return $query->getRow();
    }
}