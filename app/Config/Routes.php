<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// auth
$routes->get('login', 'Auth::login');
$routes->post('proses_login', 'Auth::proses_login');
$routes->get('logout', 'Auth::logout');

// admin
$routes->get('dashboard_admin', 'Admin::dashboard_admin');
$routes->get('kategori_buku', 'Admin::kategori_buku');
$routes->post('proses_tambah_kategori_buku', 'Admin::proses_tambah_kategori_buku');
$routes->post('proses_edit_kategori_buku', 'Admin::proses_edit_kategori_buku');

// petugas
$routes->get('dashboard_petugas', 'Petugas::dashboard_petugas');
