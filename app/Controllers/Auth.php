<?php

namespace App\Controllers;
use App\Models\ModelPetugas;
use App\Models\ModelMember;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelPetugas = new ModelPetugas();
        $this->ModelMember = new ModelMember();
    }

    public function login_petugas()
    {
        $data = [
            'judul' => 'Login',
            'validation' => \Config\Services::validation()

        ];
        echo view('auth/login_petugas', $data);
    }

    public function proses_login_petugas()
    {
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $password = $request->getVar('password');

        $dapatkan_user_role = $this->ModelPetugas->dapatkan_user_role($email)->getRow();
    
        if ($dapatkan_user_role) {
            // Memeriksa kecocokan password tanpa menggunakan password_verify
            if ($password === $dapatkan_user_role->password) {
                if ($dapatkan_user_role->role == 'admin') {
                    // Menyimpan data user ke dalam sesi
                    session()->set([
                        'email' => $dapatkan_user_role->email,
                        'role' => $dapatkan_user_role->role,
                        'nama_lengkap' => $dapatkan_user_role->nama_lengkap,
                        'status_login' => TRUE,
                    ]);

                    session()->setFlashdata('success', 'Anda Berhasil Login');
                    return redirect()->to(base_url('/dashboard_admin'));
                } else {
                    session()->set([
                        'email' => $dapatkan_user_role->email,
                        'role' => $dapatkan_user_role->role,
                        'nama_lengkap' => $dapatkan_user_role->nama_lengkap,
                        'status_login' => TRUE,
                    ]);

                    session()->setFlashdata('success', 'Anda Berhasil Login');
                    return redirect()->to(base_url('/dashboard_petugas'));
                }
                
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/login_petugas'));
            }
        } else {
            session()->setFlashdata('error', 'Akun Tidak Ditemukan!');
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function register_member()
    {
        $data = [
            'judul' => 'Register Member',
            'validation' => \Config\Services::validation()

        ];
        echo view('auth/register_member', $data);
    }

    public function proses_register_member()
    {
        $request = \Config\Services::request();
        $password = $request->getVar('password');
        $email = $request->getVar('email');
        $no_telpon = $request->getVar('no_telpon');
        $nama_lengkap = $request->getVar('nama_lengkap');
        $alamat = $request->getVar('alamat');
        $data = [
            'password' => $password,
            'email' => $email,
            'no_telpon' => $no_telpon,
            'nama_lengkap' => $nama_lengkap,
            'alamat' => $alamat,

        ];
        $tambah_member = $this->ModelMember->tambah_member($data);
        session()->setFlashdata('success', 'Anda Berhasil Membuat Akun');
        return redirect()->to(base_url('login_member'));
    }

    public function login_member()
    {
        $data = [
            'judul' => 'Login Member',
            'validation' => \Config\Services::validation()

        ];
        echo view('auth/login_member', $data);
    }

    public function proses_login_member()
    {
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $password = $request->getVar('password');

        $dapatkan_member = $this->ModelMember->dapatkan_member($email)->getRow();
    
        if ($dapatkan_member) {
            // Memeriksa kecocokan password tanpa menggunakan password_verify
            if ($password === $dapatkan_member->password) {
                // Menyimpan data user ke dalam sesi
                session()->set([
                    'id_member' => $dapatkan_member->id_member,
                    'email' => $dapatkan_member->email,
                    'nama_lengkap' => $dapatkan_member->nama_lengkap,
                    'alamat' => $dapatkan_member->alamat,
                    'no_telpon' => $dapatkan_member->no_telpon,
                    'status_login' => TRUE,
                ]);

                session()->setFlashdata('success', 'Anda Berhasil Login');
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/login_member'));
            }
        } else {
            session()->setFlashdata('error', 'Akun Member Tidak Ditemukan!');
            return redirect()->to(base_url('/login_member'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login_member'));
    }
}