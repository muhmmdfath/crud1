<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/karyawan', 'Home::index');
$routes->get('/karyawan/tambah', 'Home::tambah');
$routes->post('/karyawan/simpan', 'Home::simpan');
$routes->get('/karyawan/edit/(:num)', 'Home::edit/$1');
$routes->post('/karyawan/update/(:num)', 'Home::update/$1');
$routes->get('/karyawan/delete/(:num)', 'Home::delete/$1');


$routes->get('login', 'AuthController::login');
$routes->post('auth/loginSubmit', 'AuthController::loginSubmit');
$routes->post('/auth/registerSubmit', 'AuthController::registerSubmit');
$routes->get('logout', 'AuthController::logout');
