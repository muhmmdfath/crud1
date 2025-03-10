<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('karyawan', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('tambah', 'Home::tambah');
    $routes->post('simpan', 'Home::simpan');
    $routes->get('edit/(:num)', 'Home::edit/$1');
    $routes->post('update/(:num)', 'Home::update/$1');
    $routes->get('delete/(:num)', 'Home::delete/$1');
});

$routes->get('/', 'Home::home');
$routes->get('/testdb', 'TestDB::index');


$routes->group('auth', function ($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('loginSubmit', 'AuthController::loginSubmit');
    $routes->post('registerSubmit', 'AuthController::registerSubmit');
    $routes->get('logout', 'AuthController::logout');
});

// $routes->get('/oitm/search', 'PartController::searchOITM');
$routes->get('/part/search', 'PartController::search');
$routes->post('/part/save', 'PartController::save');
$routes->get('/part/delete/(:num)', 'PartController::delete/$1');
