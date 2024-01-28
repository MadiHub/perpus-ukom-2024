<?php

namespace App\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelMember;
use App\Models\ModelPeminjaman;
use App\Models\ModelUlasan;

class Member extends BaseController
{
    public function __construct()
    {
        $this->ModelBuku = new ModelBuku();
        $this->ModelMember = new ModelMember();
        $this->ModelPeminjaman = new ModelPeminjaman();
        $this->ModelUlasan = new ModelUlasan();
    }

    public function index()
    {
        // data sesion
        $status_login = session()->get('status_login');
        $email = session()->get('email');
        $id_member = session()->get('id_member');
        $username = session()->get('username');
        $nama_lengkap = session()->get('nama_lengkap');
        $dapatkan_member = $this->ModelMember->dapatkan_member($email)->getRow();

        $semua_buku = $this->ModelBuku->semua_buku();
        $data = [
            'judul' => 'Beranda Member',
            'semua_buku' => $semua_buku,  
            'status_login' => $status_login,  
            'id_member' => $id_member,  
            'username' => $username,  
            'nama_lengkap' => $nama_lengkap,  
            'email' => $email,  
        ];
        echo view('member/layout/head', $data);
        echo view('member/layout/nav', $data);
        echo view('member/beranda', $data);
        echo view('member/layout/footer', $data);
    }

    public function not_found() {
        return view('not_found');
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

        $semua_ulasan = $this->ModelUlasan->ulasanByBuku($id_buku);

        if ($status_login == TRUE) {
            if ($id_member) {
                $data = [
                    'id_buku'  => $id_buku,
                    'id_member'  => $id_member,
                    'id_kategori_buku' => $id_kategori_buku,
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'status_login' => $status_login,
                    'tanggal_pinjam' => $tanggal_pinjam,
                    'judul' => $judul,
                    'penulis' => $penulis,
                    'penerbit' => $penerbit,
                    'tahun_terbit' => $tahun_terbit,
                    'sampul_buku' => $sampul_buku,
                    'nama_kategori_buku' => $nama_kategori_buku,
                    'semua_ulasan' => $semua_ulasan,
                ];
                echo view('member/layout/head', $data);
                echo view('member/layout/nav', $data);
                echo view('member/pinjam_buku', $data);
                echo view('member/layout/footer', $data);

            } else {
                session()->setFlashdata('info', 'Petugas Tidak Bisa Meminjam Buku');
                return redirect()->to(base_url('/'));
            }
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
        $total_pinjam = $request->getVar('total_pinjam');
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
            'total_pinjam' => $total_pinjam,
        ];
        $tambah_peminjaman = $this->ModelPeminjaman->tambah_peminjaman($data);

        $dapatkan_buku = $this->ModelBuku->dapatkan_buku($id_buku);
        $stok_sekarang = $dapatkan_buku->stok;

        $stok_baru = $stok_sekarang - $total_pinjam;

        $ubah = $this->ModelBuku->edit_buku_dipinjam($id_buku, $stok_baru);
        session()->setFlashdata('success', 'Anda Berhasil Meminjam Buku');
        return redirect()->to(base_url('/'));
    }

    public function buku_dipinjam()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $status_login = session()->get('status_login');
        $tanggal_pinjam = date("Y-m-d");
        
        $buku_dipinjam_by_member = $this->ModelPeminjaman->buku_dipinjam_by_member($id_member);

        if ($status_login == TRUE) {
            $data = [
                'buku_dipinjam_by_member'  => $buku_dipinjam_by_member,
                'status_login'  => $status_login,
                'judul'  => 'Riwayat Peminjaman',
                'nama_lengkap'  => $nama_lengkap
            ];
            echo view('member/layout/head', $data);
            // echo view('member/layout/nav', $data);
            echo view('member/buku_dipinjam', $data);
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }
    public function proses_ulasan()
    {
        $request = \Config\Services::request();
        $id_member = $request->getVar('id_member');
        $id_buku = $request->getVar('id_buku');
        $ulasan = $request->getVar('ulasan');
        $rating = $request->getVar('rating');
        $tanggal_ulasan = date('Y-m-d');
        
        $cek_user_ulasan = $this->ModelUlasan->cek_user_ulasan($id_member, $id_buku);
        $semua_ulasan = $this->ModelUlasan->ulasanByBuku($id_buku);

        if($cek_user_ulasan) {
            session()->setFlashdata('info', 'Anda Sudah Memberikan Ulasan');
            return redirect()->back();
        } else {
            $data = [
                'id_member' => $id_member,
                'id_buku' => $id_buku,
                'ulasan' => $ulasan,
                'rating' => $rating,
                'tanggal_ulasan' => $tanggal_ulasan,
            ];
            $tambah = $this->ModelUlasan->tambah_ulasan($data);
            session()->setFlashdata('success', 'Anda Berhasil Memberikan Ulasan');
            return redirect()->back();
        }
        
    }
}
