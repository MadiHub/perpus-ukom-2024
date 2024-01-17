<?php

namespace App\Controllers;

class Admin extends BaseController
{
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
}
