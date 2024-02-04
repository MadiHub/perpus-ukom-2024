<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPetugas extends Model
{
    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = ['id_petugas','nama_lengkap', 'alamat', 'role', 'email','no_telpon', 'password'];

    public function dapatkan_petugas($id_petugas = false)
    {
        if ($id_petugas === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_petugas' => $id_petugas]);
        }
    }

    public function dapatkan_user_role($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email]);
        }
    }

    public function semua_admin()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->where('role', 'admin')
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function semua_petugas()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->where('role', 'petugas')
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function tambah_petugas($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }


    public function edit_admin($data, $id_petugas)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_petugas', $id_petugas);
        return $builder->update($data);
    }

    public function hapus_admin($id_petugas)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_petugas' => $id_petugas]);
    }
}