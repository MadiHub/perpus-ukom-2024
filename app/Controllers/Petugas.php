<?php

namespace App\Controllers;
use App\Models\ModelPeminjaman;
use App\Models\ModelPengembalian;


class Petugas extends BaseController
{
    public function __construct()
    {
        $this->ModelPeminjaman = new ModelPeminjaman();
        $this->ModelPengembalian = new ModelPengembalian();
    }

    public function dashboard_petugas()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        if ($status_login == TRUE) {
            if ($role == 'petugas') {
                $data = [
                    'judul' => 'Dashboard Petugas',
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('petugas/layout/head', $data);
                echo view('petugas/layout/side');
                echo view('petugas/layout/nav');
                echo view('petugas/dashboard_petugas');
                echo view('petugas/layout/script');
            } else {
                return redirect()->to(base_url('/not_found'));            
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function daftar_peminjam()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $semua_peminjam = $this->ModelPeminjaman->getAllStatusDipinjam();
    
        if ($status_login == TRUE) {
            if ($role == 'petugas') {
                $data = [
                    'judul' => 'Daftar Peminjam',
                    'semua_peminjam' => $semua_peminjam,
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('petugas/layout/head', $data);
                echo view('petugas/layout/side');
                echo view('petugas/layout/nav');
                echo view('petugas/daftar_peminjam');
                echo view('petugas/layout/script');
            } else {
                return redirect()->to(base_url('/not_found'));            
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function proses_edit_peminjaman()
    {
        $request = \Config\Services::request();
        $id_peminjaman = $this->request->getPost('id_peminjaman');
        $id_pengembalian = $this->request->getPost('id_pengembalian');
        $id_member = $this->request->getPost('id_member');
        $tanggal_pengembalian = $this->request->getPost('tanggal_pengembalian');
        $tanggal_hari_ini = $this->request->getPost('tanggal_hari_ini');
        $total_pinjam = $this->request->getPost('total_pinjam');
        $total_pengembalian = $this->request->getPost('total_pengembalian');
        $uang_dibayarkan = $this->request->getPost('uang_dibayarkan');
        $uang_kembalian = $this->request->getPost('uang_kembalian');
        $status_peminjaman = $this->request->getPost('status_peminjaman');
            
        $total_keterlambatan = $this->request->getPost('total_keterlambatan');
        $total_denda = $this->request->getPost('total_denda');

        // dd($total_keterlambatan, $total_denda);
        $sisa_total_pinjam = $total_pinjam - $total_pengembalian;

        // if ($total_pengembalian < $total_pinjam) {
        //     $data = [
        //         // 'status_peminjaman' => $status_peminjaman,
        //         'total_pinjam' => $sisa_total_pinjam,
        //         'total_pengembalian' => $total_pengembalian,
        //     ];
        //     $edit = $this->ModelPeminjaman->edit_status_peminjaman($data, $id_peminjaman);
        //     session()->setFlashdata('success', 'Berhasil Edit Status Pengembalian !');
        //     return redirect()->to(base_url('daftar_peminjam'));
        // } else {
        //     $data = [
        //         'status_peminjaman' => $status_peminjaman,
        //         'total_pinjam' => $sisa_total_pinjam,
        //         'total_pengembalian' => $total_pengembalian,
        //     ];
        //     $edit = $this->ModelPeminjaman->edit_status_peminjaman($data, $id_peminjaman);
        //     session()->setFlashdata('success', 'Berhasil Edit Status Pengembalian !');
        //     return redirect()->to(base_url('daftar_peminjam'));
        // }


        if($sisa_total_pinjam != '0') {
            $data_peminjaman = [
                'total_pinjam' => $sisa_total_pinjam,
            ];
            $edit = $this->ModelPeminjaman->edit_status_peminjaman($data_peminjaman, $id_peminjaman);
        } else {
            $data_peminjaman = [
                'status_peminjaman' => $status_peminjaman,
                'total_pinjam' => $sisa_total_pinjam,
            ];
            $edit = $this->ModelPeminjaman->edit_status_peminjaman($data_peminjaman, $id_peminjaman);
        }
        
       
        $data_pengembalian = [
            'id_pengembalian' => $id_pengembalian,
            'id_member' => $id_member,
            'id_peminjaman' => $id_peminjaman,
            'tanggal_pengembalian' => $tanggal_hari_ini,
            'total_pengembalian' => $total_pengembalian,
            'hari_keterlambatan' => $total_keterlambatan,
            'total_denda' => $total_denda,
            'uang_dibayarkan' => $uang_dibayarkan,
            'uang_kembalian' => $uang_kembalian,
        ];
        $tambah = $this->ModelPengembalian->tambah_pengembalian($data_pengembalian);
        session()->setFlashdata('success', 'Berhasil Edit Status Pengembalian !');
        return redirect()->to(base_url('daftar_peminjam'));
    }

    public function daftar_pengembalian()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $semua_pengembali = $this->ModelPeminjaman->getAllStatusDikembalikan();
      
        if ($status_login == TRUE) {
            if ($role == 'petugas') {
                $data = [
                    'judul' => 'Daftar Pengembalian',
                    'semua_pengembali' => $semua_pengembali,
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('petugas/layout/head', $data);
                echo view('petugas/layout/side');
                echo view('petugas/layout/nav');
                echo view('petugas/daftar_pengembalian');
                echo view('petugas/layout/script');
            } else {
                return redirect()->to(base_url('/not_found'));            
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function rekap_peminjaman()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $nm_bulan = ["", "Januari", "Februari", "Maret", "April", "
        Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        if ($status_login == TRUE) {
            if ($role == 'petugas') {
                $data = [
                    'judul' => 'Rekap Peminjaman Buku',
                    'nm_bulan' =>  $nm_bulan,
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('petugas/layout/head', $data);
                echo view('petugas/layout/side');
                echo view('petugas/layout/nav');
                echo view('petugas/rekap_peminjaman');
                echo view('petugas/layout/script');
            } else {
                return redirect()->to(base_url('/not_found'));            
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
        
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
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $nm_bulan = ["", "Januari", "Februari", "Maret", "April", "
        Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        if ($status_login == TRUE) {
            if ($role == 'petugas') {
                $data = [
                    'judul' => 'Rekap Pengembalian Buku',
                    'nm_bulan' =>  $nm_bulan,
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('petugas/layout/head', $data);
                echo view('petugas/layout/side');
                echo view('petugas/layout/nav');
                echo view('petugas/rekap_pengembalian');
                echo view('petugas/layout/script');
            } else {
                return redirect()->to(base_url('/not_found'));
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }

        
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
