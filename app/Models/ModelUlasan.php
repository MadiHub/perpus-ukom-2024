<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUlasan extends Model
{
    protected $table = 'tb_ulasan_buku';
    protected $primaryKey = 'id_ulasan';
    protected $allowedFields = [
        'id_ulasan', 
        'id_member',
        'id_buku',
        'ulasan',
        'rating',
    ];

    public function tambah_ulasan($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function cek_user_ulasan($id_member, $id_buku)
    {
        return $this->getWhere([
            'id_member' => $id_member,
            'id_buku' => $id_buku,
        ])->getRow();
    }

    public function ulasanByBuku($id_buku)
    {
        return $this->select('tb_ulasan_buku.*, tb_member.*, tb_buku.*')
        ->join('tb_member', 'tb_member.id_member = tb_ulasan_buku.id_member')
        ->join('tb_buku', 'tb_buku.id_buku = tb_ulasan_buku.id_buku')
        ->where('tb_ulasan_buku.id_buku', $id_buku) // Ubah agar spesifik ke kolom ulasan_buku
        ->get()
        ->getResultArray();
    }

    public function avgRating($id_buku)
    {
        $query = $this->db->query('SELECT AVG(rating) as average_rating FROM ' . $this->table . ' WHERE id_buku = ?', [$id_buku]);
        return $query->getRow()->average_rating;
    }
}