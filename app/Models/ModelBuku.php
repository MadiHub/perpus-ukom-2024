<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table = 'tb_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['id_buku','id_kategori_buku', 'judul', 'penulis', 'penerbit', 'tahun_terbit', 'sampul_buku'];

    public function tambah_buku($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function semua_buku()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = '.$this->table.'.id_kategori_buku')
            ->get()
            ->getResultArray();
        return $batasan;
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

    public function hapus_buku($id_buku)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_buku' => $id_buku]);
    }
}