<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
//view data user
$routes->get('/user/userlist', 'User::index');
//insert data user
$routes->get('/user/tambahuser', 'User::tambahuser');
$routes->post('/user/add', 'User::add');
//delete data user
$routes->get('user/delete/(:any)', 'User::notfound');
$routes->delete('/user/delete/(:num)', 'User::delete/$1');
//update data user
$routes->get('user/edituser/(:segment)', 'User::edituser/$1');
$routes->put('user/ubah/(:num)', 'User::ubah/$1');
//ubah password
$routes->get('user/ubahpassword/(:segment)', 'User::ubahpassword/$1');
$routes->put('user/ubahpasswd/(:num)', 'User::ubahpasswd/$1');
//view data produk
$routes->get('/produk/produklist', 'Produk::index');
//insert data produk
$routes->get('/produk/tambahproduk', 'Produk::tambahproduk');
$routes->get('/produk/adding', 'Produk::adding');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
