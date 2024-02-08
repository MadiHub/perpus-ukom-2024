<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategoriBuku extends Model
{
    protected $table = 'tb_kategori_buku';
    protected $primaryKey = 'id_kategori_buku';
    protected $allowedFields = ['id_kategori_buku', 'nama_kategori_buku'];

    public function kode_kategori() {
        $query = $this->db->table('tb_kategori_buku');
        $count = $query->countAllResults();
    
        if ($count == 0) {
            return 'KT-001'; // Jika tidak ada data, beri nomor otomatis pertama
        } else {
            // Ambil nomor otomatis terkecil yang belum digunakan
            $usedCodes = $query->select('id_kategori_buku')->get()->getResultArray();
            $existingNumbers = array_map(function ($code) {
                return (int)substr($code['id_kategori_buku'], strlen('KT-'));
            }, $usedCodes);
    
            $newNumber = min(array_diff(range(1, $count + 1), $existingNumbers));
    
            $newCode = 'KT-' . sprintf("%03d", $newNumber);
    
            return $newCode;
        }
    }

    public function tambah_kategori_buku($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function semua_kategori_buku()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->orderBy('id_kategori_buku', 'ASC') 
            ->get()->getResultArray();
        return $batasan;
    }


    public function dapatkanKategoriBuku($id_kategori_buku = false)
    {
        if ($id_kategori_buku === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kategori_buku' => $id_kategori_buku]);
        }
    }

    public function edit_kategori_buku($data, $id_kategori_buku)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_kategori_buku', $id_kategori_buku);
        return $builder->update($data);
    }

    public function hapus_kategori_buku($id_kategori_buku)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_kategori_buku' => $id_kategori_buku]);
    }
}