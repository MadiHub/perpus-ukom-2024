<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRoles extends Model
{
    protected $table = 'tb_roles';
    protected $primaryKey = 'id_role';
    protected $allowedFields = ['nama_lengkap', 'alamat', 'role', 'email','no_telpon', 'password'];

    public function dapatkan_user_role($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email]);
        }
    }
}