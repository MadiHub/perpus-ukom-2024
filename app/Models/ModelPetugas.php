<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPetugas extends Model
{
    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = ['id_petugas','nama_lengkap', 'alamat', 'role', 'email','no_telpon', 'password'];

    public function kode_admin() {
        $query = $this->db->table('tb_petugas');
        $query->like('id_petugas', 'A', 'after');
        $query->select('id_petugas');
        $result = $query->get()->getResult();
    
        $existingNumbers = array_map(function ($code) {
            return (int)substr($code->id_petugas, -3);
        }, $result);
    
        // Jika tidak ada nomor yang digunakan, gunakan 1, jika ada gunakan nomor selanjutnya
        $newNumber = empty($existingNumbers) ? 1 : min(array_diff(range(1, max($existingNumbers) + 2), $existingNumbers));
    
        return 'A-' . sprintf("%03d", $newNumber);
    }

    public function kode_petugas() {
        $query = $this->db->table('tb_petugas');
        $query->like('id_petugas', 'P', 'after');
        $query->select('id_petugas');
        $result = $query->get()->getResult();
    
        $existingNumbers = array_map(function ($code) {
            return (int)substr($code->id_petugas, -3);
        }, $result);
    
        // Jika tidak ada nomor yang digunakan, gunakan 1, jika ada gunakan nomor selanjutnya
        $newNumber = empty($existingNumbers) ? 1 : min(array_diff(range(1, max($existingNumbers) + 2), $existingNumbers));
    
        return 'P-' . sprintf("%03d", $newNumber);
    }

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

    public function total_petugas()
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_petugas) as total_petugas')
            ->where('role', 'petugas')
            ->get();

        return $query->getRow();
    }

    public function total_admin()
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_petugas) as total_admin')
            ->where('role', 'admin')
            ->get();

        return $query->getRow();
    }
}