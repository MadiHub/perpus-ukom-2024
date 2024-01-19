<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategoriBuku extends Model
{
    protected $table = 'tb_kategori_buku';
    protected $primaryKey = 'id_kategori_buku';
    protected $allowedFields = ['id_kategori_buku', 'nama_kategori_buku'];

    public function tambah_kategori_buku($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function semua_kategori_buku()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
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