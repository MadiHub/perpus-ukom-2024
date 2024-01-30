<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKoleksiBuku extends Model
{
    protected $table = 'tb_koleksi_buku';
    protected $primaryKey = 'id_koleksi';
    protected $allowedFields = [
        'id_koleksi', 
        'id_member',
        'id_buku',
        'id_kategori_buku',
    ];

    public function tambah_koleksi($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

     // query untuk method buku_dikembalikan by member
     public function semua_koleksi_by_member($id_member)
     {
         $query = $this->db->table('tb_koleksi_buku');
         $result = $query->select('*')
             ->join('tb_member', 'tb_member.id_member = tb_koleksi_buku.id_member')
             ->join('tb_buku', 'tb_buku.id_buku = tb_koleksi_buku.id_buku')
             ->join('tb_kategori_buku', 'tb_kategori_buku.id_kategori_buku = tb_buku.id_kategori_buku')
             ->where('tb_koleksi_buku.id_member', $id_member)
             ->get()
             ->getResultArray();
     
         return $result;
     }

    public function cek_user_koleksi($id_member, $id_buku)
    {
        return $this->getWhere([
            'id_member' => $id_member,
            'id_buku' => $id_buku,
        ])->getRow();
    }


}