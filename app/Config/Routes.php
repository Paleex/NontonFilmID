<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('jadwal', 'JadwalFilm::index'); // Menampilkan halaman jadwal
