<?php

namespace App\Controllers;
use App\Models\ModelBuku;

class PinjamBuku extends BaseController
{
    public function __construct()
    {
        $this->ModelBuku = new ModelBuku();
    }

    public function pinjam_buku($id_buku)
    {
        $status_login = session()->get('status_login');
        
        $dapatkan_buku = $this->ModelBuku->dapatkan_buku($id_buku);
        $id_buku = $dapatkan_buku->id_buku;
        $id_kategori_buku = $dapatkan_buku->id_kategori_buku;
        $judul = $dapatkan_buku->judul;
        $penulis = $dapatkan_buku->penulis;
        $penerbit = $dapatkan_buku->penerbit;
        $tahun_terbit = $dapatkan_buku->tahun_terbit;
        $sampul_buku = $dapatkan_buku->sampul_buku;
        $nama_kategori_buku = $dapatkan_buku->nama_kategori_buku;
        $data = [
            'id_buku'  => $id_buku,
            'id_kategori_buku' => $id_kategori_buku,
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'sampul_buku' => $sampul_buku,
            'nama_kategori_buku' => $nama_kategori_buku,
        ];
        echo view('pinjam_buku', $data);
    }
}
