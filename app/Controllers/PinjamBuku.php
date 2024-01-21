<?php

namespace App\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelPeminjaman;

class PinjamBuku extends BaseController
{
    public function __construct()
    {
        $this->ModelBuku = new ModelBuku();
        $this->ModelPeminjaman = new ModelPeminjaman();
    }

    public function pinjam_buku($id_buku)
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $tanggal_pinjam = date("Y-m-d");
        
        $dapatkan_buku = $this->ModelBuku->dapatkan_buku($id_buku);
        $id_buku = $dapatkan_buku->id_buku;
        $id_kategori_buku = $dapatkan_buku->id_kategori_buku;
        $judul = $dapatkan_buku->judul;
        $penulis = $dapatkan_buku->penulis;
        $penerbit = $dapatkan_buku->penerbit;
        $tahun_terbit = $dapatkan_buku->tahun_terbit;
        $sampul_buku = $dapatkan_buku->sampul_buku;
        $nama_kategori_buku = $dapatkan_buku->nama_kategori_buku;

        if ($status_login == TRUE) {
            $data = [
                'id_buku'  => $id_buku,
                'id_member'  => $id_member,
                'id_kategori_buku' => $id_kategori_buku,
                'nama_lengkap' => $nama_lengkap,
                'email' => $email,
                'tanggal_pinjam' => $tanggal_pinjam,
                'judul' => $judul,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
                'sampul_buku' => $sampul_buku,
                'nama_kategori_buku' => $nama_kategori_buku,
            ];
            echo view('member/pinjam_buku', $data);
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }

    public function proses_pinjam_buku()
    {
        $request = \Config\Services::request();
        $id_member = $request->getVar('id_member');
        $id_buku = $request->getVar('id_buku');
        $tanggal_peminjaman = $request->getVar('tanggal_peminjaman');
        $tanggal_pengembalian = $request->getVar('tanggal_pengembalian');
        $status_peminjaman = 'di-pinjam';

        // Verifikasi apakah buku sudah dipinjam oleh anggota
        $buku_dipinjam = $this->ModelPeminjaman->cek_buku_dipinjam($id_member, $id_buku);

        if ($buku_dipinjam) {
            // Jika buku sudah dipinjam, berikan pesan kesalahan atau ambil tindakan lain sesuai kebutuhan.
            session()->setFlashdata('error', 'Anda sudah meminjam buku ini sebelumnya.');
            return redirect()->to(base_url('/'));
        }
        $data = [
            'id_member' => $id_member,
            'id_buku' => $id_buku,
            'tanggal_peminjaman' => $tanggal_peminjaman,
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'status_peminjaman' => $status_peminjaman,

        ];
        $tambah_peminjaman = $this->ModelPeminjaman->tambah_peminjaman($data);

        session()->setFlashdata('success', 'Anda Berhasil Meminjam Buku');
        return redirect()->to(base_url('/'));
    }

    public function buku_dipinjam()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $tanggal_pinjam = date("Y-m-d");
        
        $buku_dipinjam_by_member = $this->ModelPeminjaman->buku_dipinjam_by_member($id_member);

        if ($status_login == TRUE) {
            $data = [
                'buku_dipinjam_by_member'  => $buku_dipinjam_by_member,
               
            ];
            echo view('member/buku_dipinjam', $data);
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }
}
