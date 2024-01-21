<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// auth
$routes->get('login_petugas', 'Auth::login_petugas');
$routes->post('proses_login_petugas', 'Auth::proses_login_petugas');
$routes->get('login_member', 'Auth::login_member');
$routes->post('proses_login_member', 'Auth::proses_login_member');
$routes->get('register_member', 'Auth::register_member');
$routes->post('proses_register_member', 'Auth::proses_register_member');
$routes->get('logout', 'Auth::logout');

// admin 
$routes->get('dashboard_admin', 'Admin::dashboard_admin');
// admin kategori buku
$routes->get('kategori_buku', 'Admin::kategori_buku');
$routes->post('proses_tambah_kategori_buku', 'Admin::proses_tambah_kategori_buku');
$routes->post('proses_edit_kategori_buku', 'Admin::proses_edit_kategori_buku');
$routes->get('hapus_kategori_buku/(:segment)', 'Admin::hapus_kategori_buku/$1');
// admin buku
$routes->get('daftar_buku', 'Admin::daftar_buku');
$routes->post('proses_tambah_buku', 'Admin::proses_tambah_buku');
$routes->post('proses_edit_buku', 'Admin::proses_edit_buku');
$routes->get('hapus_buku/(:segment)', 'Admin::hapus_buku/$1');

// petugas
$routes->get('dashboard_petugas', 'Petugas::dashboard_petugas');

// pinjam buku
$routes->get('pinjam_buku/(:segment)', 'PinjamBuku::pinjam_buku/$1');
$routes->post('proses_pinjam_buku', 'PinjamBuku::proses_pinjam_buku');
