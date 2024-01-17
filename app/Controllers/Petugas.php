<?php

namespace App\Controllers;

class Petugas extends BaseController
{
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
}
