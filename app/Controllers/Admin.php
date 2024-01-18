<?php

namespace App\Controllers;

use App\Models\ModelKategoriBuku;


class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelKategoriBuku = new ModelKategoriBuku();
    }
    public function dashboard_admin()
    {
        $data = [
            'judul' => 'Dashboard Admin'
        ];
        echo view('admin/layout/head', $data);
        echo view('admin/layout/side');
        echo view('admin/layout/nav');
        echo view('admin/dashboard_admin');
        echo view('admin/layout/script');
    }
    public function kategori_buku()
    {
        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();
        $data = [
            'judul' => 'Kategori Buku',
            'semua_kategori_buku' => $semua_kategori_buku,
        ];
        echo view('admin/layout/head', $data);
        echo view('admin/layout/side');
        echo view('admin/layout/nav');
        echo view('admin/kategori_buku');
        echo view('admin/layout/script');
    }
    public function proses_tambah_kategori_buku()
    {
        $nama_kategori_buku = $this->request->getPost('nama_kategori_buku');
        $data = [
            'nama_kategori_buku' => $nama_kategori_buku
        ];
        $simpan = $this->ModelKategoriBuku->tambah_kategori_buku($data);
        session()->setFlashdata('success', 'Berhasil Edit Kategori Buku !');
        return redirect()->to(base_url('/kategori_buku'));
    }
    public function proses_edit_kategori_buku()
    {
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $nama_kategori_buku = $this->request->getPost('nama_kategori_buku');
        $data = [
            'nama_kategori_buku' => $nama_kategori_buku,
            'nama_kategori_buku' => $nama_kategori_buku
        ];
        $simpan = $this->ModelKategoriBuku->edit_kategori_buku($data, $id_kategori_buku);
        session()->setFlashdata('success', 'Berhasil Edit Kategori Buku !');
        return redirect()->to(base_url('/kategori_buku'));
    }
}
