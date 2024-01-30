<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// member
$routes->get('/', 'Member::index');
$routes->get('not_found', 'Member::not_found');
$routes->get('pinjam_buku/(:segment)', 'Member::pinjam_buku/$1');
$routes->post('proses_pinjam_buku', 'Member::proses_pinjam_buku');
$routes->post('proses_ulasan', 'Member::proses_ulasan');
$routes->get('riwayat_peminjaman', 'Member::riwayat_peminjaman');
$routes->get('riwayat_pengembalian', 'Member::riwayat_pengembalian');

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

// admin daftar admin
$routes->get('daftar_admin', 'Admin::daftar_admin');
$routes->post('proses_tambah_admin', 'Admin::proses_tambah_admin');
$routes->post('proses_edit_admin', 'Admin::proses_edit_admin');
$routes->get('hapus_admin/(:segment)', 'Admin::hapus_admin/$1');

// admin daftar petugas
$routes->get('daftar_petugas', 'Admin::daftar_petugas');
$routes->post('proses_tambah_petugas', 'Admin::proses_tambah_petugas');
$routes->post('proses_edit_petugas', 'Admin::proses_edit_petugas');
$routes->get('hapus_petugas/(:segment)', 'Admin::hapus_petugas/$1');

// admin daftar member
$routes->get('daftar_member', 'Admin::daftar_member');

// admin kategori buku
$routes->get('kategori_buku', 'Admin::kategori_buku');
$routes->post('proses_tambah_kategori_buku', 'Admin::proses_tambah_kategori_buku');
$routes->post('proses_edit_kategori_buku', 'Admin::proses_edit_kategori_buku');
$routes->post('proses_edit_kategori_sub_buku', 'Admin::proses_edit_kategori_sub_buku');
$routes->get('hapus_kategori_buku/(:segment)', 'Admin::hapus_kategori_buku/$1');

// admin sub kategori 
$routes->get('sub_kategori', 'Admin::sub_kategori');
$routes->post('proses_tambah_sub_kategori', 'Admin::proses_tambah_sub_kategori');
$routes->post('proses_edit_sub_kategori', 'Admin::proses_edit_sub_kategori');
$routes->get('hapus_kategori_buku/(:segment)', 'Admin::hapus_kategori_buku/$1');
$routes->post('admin/getDataByKategori', 'Admin::loadSubKategori');
$routes->get('hapus_sub_kategori/(:segment)', 'Admin::hapus_sub_kategori/$1');

// admin buku
$routes->get('daftar_buku', 'Admin::daftar_buku');
$routes->post('proses_tambah_buku', 'Admin::proses_tambah_buku');
$routes->post('proses_edit_buku', 'Admin::proses_edit_buku');
$routes->get('hapus_buku/(:segment)', 'Admin::hapus_buku/$1');

// petugas
$routes->get('dashboard_petugas', 'Petugas::dashboard_petugas');
$routes->get('daftar_peminjam', 'Petugas::daftar_peminjam');
$routes->post('proses_edit_peminjaman', 'Petugas::proses_edit_peminjaman');
$routes->get('daftar_pengembalian', 'Petugas::daftar_pengembalian');
$routes->get('rekap_peminjaman', 'Petugas::rekap_peminjaman');
$routes->post('cetak_peminjaman', 'Petugas::cetak_peminjaman');
$routes->get('rekap_pengembalian', 'Petugas::rekap_pengembalian');
$routes->post('cetak_pengembalian', 'Petugas::cetak_pengembalian');

// pinjam buku


// $routes->set404Override(function() {
// 	return view('not_found');
// });