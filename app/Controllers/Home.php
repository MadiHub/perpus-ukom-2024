<?php

namespace App\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelMember;
use App\Models\ModelPeminjaman;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelBuku = new ModelBuku();
        $this->ModelMember = new ModelMember();
        $this->ModelPeminjaman = new ModelPeminjaman();

    }

    public function index(): string
    {
        // data sesion
        $status_login = session()->get('status_login');
        $email = session()->get('email');
        $id_member = session()->get('id_member');
        $username = session()->get('username');
        $dapatkan_member = $this->ModelMember->dapatkan_member($email)->getRow();
        $buku_dipinjam_by_member = $this->ModelPeminjaman->buku_dipinjam_by_member($id_member);

        $semua_buku = $this->ModelBuku->semua_buku();
        $data = [
            'semua_buku' => $semua_buku,  
            'status_login' => $status_login,  
            'username' => $username,  
            'email' => $email,  
            'buku_dipinjam_by_member' => $buku_dipinjam_by_member,  
        ];
        return view('beranda', $data);
    }
}
