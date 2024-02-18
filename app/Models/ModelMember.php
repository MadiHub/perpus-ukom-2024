<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMember extends Model
{
    protected $table = 'tb_member';
    protected $primaryKey = 'id_member';
    protected $allowedFields = ['id_member', 'nama_lengkap', 'username', 'password', 'email','no_telpon', 'alamat'];

    public function dapatkan_member($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email]);
        }
    }

    public function tambah_member($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function semua_member()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function total_member()
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_member) as total_member')
            ->get();

        return $query->getRow();
    }
}