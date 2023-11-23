<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->get('/', 'Home::index');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->get('logout', 'Login::logout');

$routes->get('sejarah', 'Home::profileSejarah');
$routes->get('visi-misi', 'Home::profileVisiMisi');
$routes->get('struktur-organisasi', 'Home::profileStrukturOrganisasi');
$routes->get('fasilitas', 'Home::fasilitas');
$routes->get('book', 'Home::book');


$routes->get('news', 'News::index');
$routes->get('news/(:segment)', 'News::index/$1');

$routes->get('layanan', 'Layanan::index');
$routes->get('layanan/(:segment)', 'Layanan::index/$1');
