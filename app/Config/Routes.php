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

// Controller Login
$routes->get('logout', 'Login::logout');

// Controller Home
$routes->get('sejarah', 'Home::sejarah');
$routes->get('visi-misi', 'Home::visi_misi');
$routes->get('struktur-organisasi', 'Home::struktur_organisasi');
$routes->get('bio-mahbub', 'Home::bio-mahbub');
$routes->get('layanan', 'Home::layanan');
$routes->get('layanan/(:segment)', 'Home::layanan/$1');
$routes->get('fasilitas', 'Home::fasilitas');
$routes->get('book', 'Home::book');
$routes->get('book-print', 'Home::book_print');
$routes->get('jurnal-nasional', 'Home::jurnal_nasional');
$routes->get('jurnal-internasional', 'Home::jurnal_internasional');

// Controller Post
$routes->get('post', 'Post::index');
$routes->get('post/(:segment)', 'Post::index/$1');
$routes->get('category', 'Post::category');
$routes->get('category/(:segment)', 'Post::category/$1');
$routes->get('tags', 'Post::tags');
$routes->get('tags/(:segment)', 'Post::tags/$1');
