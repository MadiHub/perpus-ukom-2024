<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('beranda');
    }
    public function dashboard()
    {
        echo view('admin/layout/head');
        echo view('admin/layout/side');
        echo view('admin/layout/nav');
        echo view('admin/dashboard');
        echo view('admin/layout/script');
    }
}
