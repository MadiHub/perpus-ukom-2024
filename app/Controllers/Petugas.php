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

    public function rekap_peminjaman()
    {
        $nm_bulan = ["", "Januari", "Februari", "Maret", "April", "
        Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $data = [
            'judul' => 'Rekap Peminjaman Buku',
            'nm_bulan' =>  $nm_bulan
        ];
        echo view('petugas/layout/head', $data);
        echo view('petugas/layout/side');
        echo view('petugas/layout/nav');
        echo view('petugas/rekap_peminjaman');
        echo view('petugas/layout/script');
    }

    public function cetak_peminjaman()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $status_peminjaman =  $this->request->getPost('status_dipinjam');

        $nm_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $cetak_peminjaman = $this->ModelPeminjaman->cetak_peminjaman($bulan, $tahun, $status_peminjaman);
        $data = [
            'judul' => 'Cetak Peminjaman',
            'bulan' => $bulan,
            'nm_bulan' => $nm_bulan,
            'data_cetak' => $cetak_peminjaman,
            'tahun' => $tahun
        ];

        return view('petugas/cetak_peminjaman', $data);
    }

    public function rekap_pengembalian()
    {
        $nm_bulan = ["", "Januari", "Februari", "Maret", "April", "
        Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $data = [
            'judul' => 'Rekap Pengembalian Buku',
            'nm_bulan' =>  $nm_bulan
        ];
        echo view('petugas/layout/head', $data);
        echo view('petugas/layout/side');
        echo view('petugas/layout/nav');
        echo view('petugas/rekap_pengembalian');
        echo view('petugas/layout/script');
    }

    public function cetak_pengembalian()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $status_peminjaman =  $this->request->getPost('status_dikembalikan');

        $nm_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $cetak_pengembalian = $this->ModelPeminjaman->cetak_pengembalian($bulan, $tahun, $status_peminjaman);
        $data = [
            'judul' => 'Cetak Peminjaman',
            'bulan' => $bulan,
            'nm_bulan' => $nm_bulan,
            'data_cetak' => $cetak_pengembalian,
            'tahun' => $tahun
        ];

        return view('petugas/cetak_pengembalian', $data);
    }
}
