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


$routes->get('sejarah', 'Home::profileSejarah');
$routes->get('visi-misi', 'Home::profileVisiMisi');
$routes->get('struktur-organisasi', 'Home::profileStrukturOrganisasi');
