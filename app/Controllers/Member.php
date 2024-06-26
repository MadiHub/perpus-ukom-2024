<?php

namespace App\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelMember;
use App\Models\ModelPeminjaman;
use App\Models\ModelPengembalian;
use App\Models\ModelUlasan;
use App\Models\ModelKoleksiBuku;
use App\Models\ModelKategoriBuku;

class Member extends BaseController
{
    public function __construct()
    {
        $this->ModelBuku = new ModelBuku();
        $this->ModelMember = new ModelMember();
        $this->ModelPeminjaman = new ModelPeminjaman();
        $this->ModelPengembalian = new ModelPengembalian();
        $this->ModelUlasan = new ModelUlasan();
        $this->ModelKoleksiBuku = new ModelKoleksiBuku();
        $this->ModelKategoriBuku = new ModelKategoriBuku();
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

        // Mendapatkan data semua buku dan kategori buku
        $semua_buku = $this->ModelBuku->semua_buku();
        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();

        // Cek apakah ada parameter pencarian
        $cari_buku = $this->request->getGet('cari_buku');

        // Jika ada parameter pencarian, cari buku berdasarkan pencarian
        if ($cari_buku) {
            $semua_buku = $this->ModelBuku->cari_buku($cari_buku);
        }

        $data = [
            'judul' => 'Beranda Member',
            'semua_buku' => $semua_buku,
            'semua_kategori_buku' => $semua_kategori_buku,
            'status_login' => $status_login,
            'id_member' => $id_member,
            'username' => $username,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
        ];

        echo view('member/layout/head', $data);
        echo view('member/layout/nav');
        echo view('member/beranda');
        echo view('member/layout/footer');
    }

    public function not_found() {
        return view('not_found');
    }
    public function profile() {
        return view('member/profile');
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
        $nama_sub_kategori = $dapatkan_buku->nama_sub_kategori;
        $stok = $dapatkan_buku->stok;

        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();
        $semua_ulasan = $this->ModelUlasan->ulasanByBuku($id_buku);
        $avgRating = $this->ModelUlasan->avgRating($id_buku);

        if ($status_login == TRUE) {
            if ($id_member) {
                if ($stok > '0') {
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
                        'nama_sub_kategori' => $nama_sub_kategori,
                        'semua_kategori_buku' => $semua_kategori_buku,
                        'semua_ulasan' => $semua_ulasan,
                        'avgRating' => $avgRating,
                        'stok' => $stok,
                    ];
                    echo view('member/layout/head', $data);
                    echo view('member/layout/nav', $data);
                    echo view('member/pinjam_buku', $data);
                    echo view('member/layout/footer', $data);
                } else {
                    session()->setFlashdata('info', 'Maaf Stok Buku Habis');
                    return redirect()->to(base_url('/'));
                }
                

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
        $buku_dipinjam = $this->ModelPeminjaman->cek_buku_dipinjam($id_member, $id_buku, $tanggal_peminjaman, $tanggal_pengembalian);
        // dd($buku_dipinjam->total_pinjam);
    
        if ($buku_dipinjam) {
            $total_pinjam_lama = $buku_dipinjam->total_pinjam;
            $tanggal_peminjaman_lama = $buku_dipinjam->tanggal_peminjaman;
            $tanggal_pengembalian_lama = $buku_dipinjam->tanggal_pengembalian;
            $total_pinjam_baru = $total_pinjam_lama + $total_pinjam;
            $total_pinjam_baru = [
                'total_pinjam' => $total_pinjam_baru
            ];
            session()->setFlashdata('success', 'Berhasil Meminjam Buku');
            $tambah_peminjaman = $this->ModelPeminjaman->edit_total_pinjam($total_pinjam_baru, $id_buku, $id_member, $tanggal_peminjaman_lama, $tanggal_pengembalian_lama);
            return redirect()->to(base_url('riwayat_peminjaman'));
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

    public function riwayat_peminjaman()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $status_login = session()->get('status_login');
        
        $buku_dipinjam_by_member = $this->ModelPeminjaman->buku_dipinjam_by_member($id_member);
        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();

        if ($status_login == TRUE) {
            $data = [
                'buku_dipinjam_by_member'  => $buku_dipinjam_by_member,
                'semua_kategori_buku'  => $semua_kategori_buku,
                'status_login'  => $status_login,
                'judul'  => 'Riwayat Peminjaman',
                'nama_lengkap'  => $nama_lengkap
            ];
            echo view('member/layout/head', $data);
            echo view('member/layout/nav');
            echo view('member/riwayat_peminjaman');
            echo view('member/layout/footer');   
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }

    public function riwayat_pengembalian()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $status_login = session()->get('status_login');
        $tanggal_pinjam = date("Y-m-d");
        
        $buku_dikembalikan_by_member = $this->ModelPengembalian->buku_dikembalikan_by_member($id_member);
        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();

        if ($status_login == TRUE) {
            $data = [
                'buku_dikembalikan_by_member'  => $buku_dikembalikan_by_member,
                'semua_kategori_buku'  => $semua_kategori_buku,
                'status_login'  => $status_login,
                'judul'  => 'Riwayat Pengembalian',
                'nama_lengkap'  => $nama_lengkap
            ];
            echo view('member/layout/head', $data);
            echo view('member/layout/nav');
            echo view('member/riwayat_pengembalian');
            echo view('member/layout/footer');   
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }

    public function koleksi_buku()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $status_login = session()->get('status_login');
        $tanggal_pinjam = date("Y-m-d");
        
        $semua_koleksi_by_member = $this->ModelKoleksiBuku->semua_koleksi_by_member($id_member);
        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();

        if ($status_login == TRUE) {
            $data = [
                'semua_koleksi_by_member'  => $semua_koleksi_by_member,
                'status_login'  => $status_login,
                'judul'  => 'Koleksi Buku',
                'semua_kategori_buku'  => $semua_kategori_buku,
                'nama_lengkap'  => $nama_lengkap
            ];
            echo view('member/layout/head', $data);
            echo view('member/layout/nav');
            echo view('member/koleksi_buku');
            echo view('member/layout/footer');
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }

    public function proses_tambah_koleksi()
    {
        $request = \Config\Services::request();
        $id_member = $request->getVar('id_member');
        $id_buku = $request->getVar('id_buku');
        $id_kategori_buku = $request->getVar('id_kategori_buku');
        $cek_user_koleksi = $this->ModelKoleksiBuku->cek_user_koleksi($id_member, $id_buku);

        if($cek_user_koleksi) {
            session()->setFlashdata('info', 'Buku Sudah Ada Dikoleksi');
            return redirect()->back();
        } else {
            $data = [
                'id_member' => $id_member,
                'id_buku' => $id_buku,
                'id_kategori_buku' => $id_kategori_buku,
            ];
            $tambah = $this->ModelKoleksiBuku->tambah_koleksi($data);
            session()->setFlashdata('success', 'Anda Berhasil Menambahkan Koleksi Buku');
            return redirect()->back();
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
    public function hapus_koleksi_buku($id_buku)
    {
        $dapatkan_buku_koleksi = $this->ModelKoleksiBuku->dapatkan_buku_koleksi($id_buku);
        if (isset($dapatkan_buku_koleksi)) {
            $this->ModelKoleksiBuku->hapus_koleksi_buku($id_buku);
            session()->setFlashdata("success", "Berhasil Hapus Koleksi Buku");
            return redirect()->to(base_url('koleksi_buku'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Koleksi");
            return redirect()->to(base_url('koleksi_buku'));
        }
    }


    public function getBukuByKategori($id_kategori_buku)
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        
        $getBukuByKategori = $this->ModelBuku->getBukuByKategori($id_kategori_buku);

        if ($getBukuByKategori != null) {
            $nama_kategori_buku = $getBukuByKategori[0]["nama_kategori_buku"];
        } else {
            $nama_kategori_buku = 'Tidak Tersedia';
        }
        $data = [
            'judul' => $nama_kategori_buku,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'status_login' => $status_login,
            'buku_kategori' => $getBukuByKategori,
        ];
        echo view('member/layout/head',$data);
        echo view('member/layout/nav');
        echo view('member/buku_kategori');
    }
}
