<?php

namespace App\Controllers;
use App\Models\ModelBuku;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelBuku = new ModelBuku();
    }

    public function index(): string
    {
        $semua_buku = $this->ModelBuku->semua_buku();
        $data = [
        'semua_buku' => $semua_buku,  
        ];
        return view('beranda', $data);
    }
}
