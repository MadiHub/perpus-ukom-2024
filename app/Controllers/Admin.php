<?php

namespace App\Controllers;

use App\Models\ModelKategoriBuku;
use App\Models\ModelBuku;


class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelKategoriBuku = new ModelKategoriBuku();
        $this->ModelBuku = new ModelBuku();
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
        session()->setFlashdata('success', 'Berhasil Tambah Kategori Buku !');
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

    public function hapus_kategori_buku($id_kategori_buku)
    {
        $dapatkanKategoriBuku = $this->ModelKategoriBuku->dapatkanKategoriBuku($id_kategori_buku)->getRow();
        
        if (isset($dapatkanKategoriBuku)) {
            $this->ModelKategoriBuku->hapus_kategori_buku($id_kategori_buku);
            session()->setFlashdata("success", "Berhasil Hapus Kategori Buku");
            return redirect()->to(base_url('kategori_buku'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Kategori Buku");
            return redirect()->to(base_url('kategori_buku'));
        }
    }

    public function daftar_buku()
    {
        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();
        $semua_buku = $this->ModelBuku->semua_buku();
        $data = [
            'judul' => 'Daftar Buku',
            'semua_kategori_buku' => $semua_kategori_buku,
            'semua_buku' => $semua_buku,
        ];
        echo view('admin/layout/head', $data);
        echo view('admin/layout/side');
        echo view('admin/layout/nav');
        echo view('admin/daftar_buku');
        echo view('admin/layout/script');
    }

    public function proses_tambah_buku()
    {
        $request = \Config\Services::request();
        $judul = $this->request->getPost('judul');
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $penulis = $this->request->getPost('penulis');
        $penerbit = $this->request->getPost('penerbit');
        $tahun_terbit = $this->request->getPost('tahun_terbit');
        $sampul_buku = $request->getFile('sampul_buku');
    
        $direktori_foto = 'buku';
        $fileName = $judul . '_' . time() . '.png';
    
        $data = [
            'judul' => $judul,
            'id_kategori_buku' => $id_kategori_buku,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'sampul_buku' => $fileName,
        ];
    
        $this->ModelBuku->tambah_buku($data);
    
        $sampul_buku->move($direktori_foto, $fileName);
        session()->setFlashdata('success', 'Data Berhasil Ditambah');
        return redirect()->to(base_url('daftar_buku'));
    }

    public function proses_edit_buku()
    {
        $request = \Config\Services::request();
        $judul = $this->request->getPost('judul');
        $id_buku = $this->request->getPost('id_buku');
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $penulis = $this->request->getPost('penulis');
        $penerbit = $this->request->getPost('penerbit');
        $tahun_terbit = $this->request->getPost('tahun_terbit');
        $sampul_buku = $request->getFile('sampul_buku');
    
        $direktori_foto = 'buku';
        $fileName = $judul . '_' . time() . '.png';
    
        // Jika sampul_buku tidak null dan valid, maka proses
        if ($sampul_buku && $sampul_buku->isValid()) {
            $buku = $this->ModelBuku->dapatkan_buku($id_buku);
            $sampul_lama = $buku->sampul_buku;
    
            // Hapus file lama jika ada
            if ($sampul_lama && file_exists($direktori_foto . '/' . $sampul_lama)) {
                unlink($direktori_foto . '/' . $sampul_lama);
            }
    
            // Update data buku
            $data = [
                'judul' => $judul,
                'id_buku' => $id_buku,
                'id_kategori_buku' => $id_kategori_buku,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
                'sampul_buku' => $fileName,
            ];
    
            $simpan = $this->ModelBuku->edit_buku($data, $id_buku);
    
            // Pindahkan file sampul_buku
            $sampul_buku->move($direktori_foto, $fileName);
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url('daftar_buku'));

        } else {
            // Jika sampul buku nya null maka update tanpa sampul
             $data = [
                'judul' => $judul,
                'id_buku' => $id_buku,
                'id_kategori_buku' => $id_kategori_buku,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
            ];
    
            $simpan = $this->ModelBuku->edit_buku($data, $id_buku);
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url('daftar_buku'));
        }    
    }
    
    public function hapus_buku($id_buku)
    {
        $dapatkan_buku = $this->ModelBuku->dapatkan_buku($id_buku)->getRow();
        $direktori_foto = 'buku';
        if (isset($dapatkan_buku)) {
            // Hapus file sampul_buku jika ada
            if ($dapatkan_buku->sampul_buku && file_exists($direktori_foto . '/' . $dapatkan_buku->sampul_buku)) {
                unlink($direktori_foto . '/' . $dapatkan_buku->sampul_buku);
            }
            $this->ModelBuku->hapus_buku($id_buku);
            session()->setFlashdata("success", "Berhasil Hapus Buku");
            return redirect()->to(base_url('daftar_buku'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Buku");
            return redirect()->to(base_url('daftar_buku'));
        }
    }
}
