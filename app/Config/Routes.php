<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard_admin', 'Admin::dashboard_admin');
$routes->get('dashboard_petugas', 'Petugas::dashboard_petugas');
$routes->get('login', 'Auth::login');
$routes->post('proses_login', 'Auth::proses_login');
$routes->get('logout', 'Auth::logout');
