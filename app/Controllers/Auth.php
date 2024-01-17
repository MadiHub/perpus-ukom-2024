<?php

namespace App\Controllers;
use App\Models\ModelRoles;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelRoles = new ModelRoles();
    }

    public function login()
    {
        $data = [
            'judul' => 'Login'
        ];
        echo view('auth/login', $data);
    }

    public function proses_login()
    {
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $password = $request->getVar('password');

        $dapatkan_user_role = $this->ModelRoles->dapatkan_user_role($email)->getRow();
    
        if ($dapatkan_user_role) {
            // Memeriksa kecocokan password tanpa menggunakan password_verify
            if ($password === $dapatkan_user_role->password) {
                if ($dapatkan_user_role->role == 'admin') {
                    // Menyimpan data user ke dalam sesi
                    session()->set([
                        'email' => $dapatkan_user_role->email,
                    ]);

                    session()->setFlashdata('success', 'Anda Berhasil Login');
                    return redirect()->to(base_url('/dashboard_admin'));
                } else {
                    session()->set([
                        'email' => $dapatkan_user_role->email,
                    ]);

                    session()->setFlashdata('success', 'Anda Berhasil Login');
                    return redirect()->to(base_url('/dashboard_petugas'));
                }
                
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('error', 'Siswa tidak ada, harap pilih kelas');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}