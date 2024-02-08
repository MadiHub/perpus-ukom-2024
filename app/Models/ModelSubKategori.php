<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSubKategori extends Model
{
    protected $table = 'tb_sub_kategori';
    protected $primaryKey = 'id_sub_kategori';
    protected $allowedFields = ['id_sub_kategori', 'nama_sub_kategori'];

    // KODE ID OTOMATIS
    public function kode_sub() {
        $query = $this->db->table('tb_sub_kategori');
        $count = $query->countAllResults();
    
        if ($count == 0) {
            return 'SK-001'; // Jika tidak ada data, beri nomor otomatis pertama
        } else {
            // Ambil nomor otomatis terkecil yang belum digunakan
            $usedCodes = $query->select('id_sub_kategori')->get()->getResultArray();
            $existingNumbers = array_map(function ($code) {
                return (int)substr($code['id_sub_kategori'], strlen('SK-'));
            }, $usedCodes);
    
            $newNumber = min(array_diff(range(1, $count + 1), $existingNumbers));
    
            $newCode = 'SK-' . sprintf("%03d", $newNumber);
    
            return $newCode;
        }
    }

    public function tambah_sub_kategori($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function semua_sub_kategori()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = '.$this->table.'.id_kategori_buku')
            ->orderBy('id_sub_kategori', 'ASC') 
            ->get()
            ->getResultArray();
        return $batasan;
    }


    public function dapatkanSubKategori($id_sub_kategori = false)
    {
        if ($id_sub_kategori === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_sub_kategori' => $id_sub_kategori]);
        }
    }

    public function edit_sub_kategori($data, $id_sub_kategori)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_sub_kategori', $id_sub_kategori);
        return $builder->update($data);
    }

    public function hapus_sub_kategori($id_sub_kategori)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_sub_kategori' => $id_sub_kategori]);
    }

    public function getSubByKategori($id_kategori_buku)
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('tb_kategori_buku.*, tb_sub_kategori.*')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = tb_sub_kategori.id_kategori_buku')
            ->where('tb_kategori_buku.id_kategori_buku', $id_kategori_buku)
            ->orderBy('nama_sub_kategori', 'ASC') 
            ->get()->getResultArray();
        return $batasan;
        $query = $this->db->table($this->table);
    }
}