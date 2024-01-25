<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table = 'tb_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['id_buku','id_kategori_buku', 'judul', 'penulis', 'penerbit', 'tahun_terbit', 'stok', 'sampul_buku'];

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
    // public function dapatkan_buku($id_buku = false)
    // {
    //     $this->select('*');
    //     $this->join('tb_kategori_buku', 'FIND_IN_SET(tb_kategori_buku.id_kategori_buku, ' . $this->table . '.id_kategori_buku) > 0', 'left');
    
    //     if ($id_buku === false) {
    //         return $this->findAll();
    //     } else {
    //         return $this->getWhere(['id_buku' => $id_buku])->getResult();
    //     }
    // }
    


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
}