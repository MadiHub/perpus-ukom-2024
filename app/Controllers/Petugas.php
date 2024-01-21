<?php

namespace App\Controllers;
use App\Models\ModelPeminjaman;


class Petugas extends BaseController
{
    public function __construct()
    {
        $this->ModelPeminjaman = new ModelPeminjaman();
    }

    public function dashboard_petugas()
    {
        $data = [
            'judul' => 'Dashboard Petugas'
        ];
        echo view('petugas/layout/head', $data);
        echo view('petugas/layout/side');
        echo view('petugas/layout/nav');
        echo view('petugas/dashboard_petugas');
        echo view('petugas/layout/script');
    }

    public function daftar_peminjam()
    {
        $semua_peminjam = $this->ModelPeminjaman->getAllStatusDipinjam();
        $data = [
            'judul' => 'Daftar Peminjam',
            'semua_peminjam' => $semua_peminjam,
        ];
        echo view('petugas/layout/head', $data);
        echo view('petugas/layout/side');
        echo view('petugas/layout/nav');
        echo view('petugas/daftar_peminjam');
        echo view('petugas/layout/script');
    }

    public function proses_edit_peminjaman()
    {
        $request = \Config\Services::request();
        $id_peminjaman = $this->request->getPost('id_peminjaman');
        $status_peminjaman = $this->request->getPost('status_peminjaman');
        $data = [
            'status_peminjaman' => $status_peminjaman,
        ];
        $edit = $this->ModelPeminjaman->edit_status_peminjaman($data, $id_peminjaman);
        session()->setFlashdata('success', 'Berhasil Edit Status Pengembalian !');
        return redirect()->to(base_url('daftar_peminjam'));
    }

    public function daftar_pengembalian()
    {
        $semua_pengembali = $this->ModelPeminjaman->getAllStatusDikembalikan();
        $data = [
            'judul' => 'Daftar Pengembalian',
            'semua_pengembali' => $semua_pengembali,
        ];
        echo view('petugas/layout/head', $data);
        echo view('petugas/layout/side');
        echo view('petugas/layout/nav');
        echo view('petugas/daftar_pengembalian');
        echo view('petugas/layout/script');
    }
}
