<?php namespace Config;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'Home::index');
// $routes->get('/', 'Login::index');
// $routes->get('/kategori', 'Admin\Kategori::select');
// $routes->get('/kategori/(:any)', 'Admin\Kategori::selectWhere/$1');

$routes->group('admin', ['filter' => 'Auth'], function($routes){
	
	// Controller AdminPage
	$routes->add('/', 'Admin\AdminPage::index');

	// Controller Kategori
	$routes->add('kategori', 'Admin\Kategori::index');
	$routes->add('kategori/create', 'Admin\Kategori::create');
	$routes->add('kategori/update/(:any)', 'Admin\Kategori::update/$1');
	$routes->add('kategori/delete/(:any)', 'Admin\Kategori::delete/$1');

	// Controller Menu
	$routes->add('menu', 'Admin\Menu::index');
	$routes->add('menu/select', 'Admin\Menu::select');
	$routes->add('menu/create', 'Admin\Menu::create');
	$routes->add('menu/update/(:any)', 'Admin\Menu::update/$1');
	$routes->add('menu/delete/(:any)', 'Admin\Menu::delete/$1');

	// Controller Pelanggan
	$routes->add('pelanggan', 'Admin\Pelanggan::index');
	$routes->add('pelanggan/update_status/(:any)/(:any)', 'Admin\Pelanggan::update_status/$1/$2');
	$routes->add('pelanggan/delete/(:any)', 'Admin\pelanggan::delete/$1');
	
	// Controller User
	$routes->add('user', 'Admin\User::index');
	$routes->add('user/create', 'Admin\User::create');
	$routes->add('user/update_status/(:any)/(:any)', 'Admin\User::update_status/$1/$2');
	$routes->add('user/update/(:any)', 'Admin\User::update/$1');
	$routes->add('user/delete/(:any)', 'Admin\User::delete/$1');
	
	// Controller Pesanan
	$routes->add('pesanan', 'Admin\Pesanan::index');
	$routes->add('pesanan/update/(:any)', 'Admin\Pesanan::update/$1');
	
	// Controller DetailPesanan
	$routes->add('detailpesanan', 'Admin\DetalPesanan::index');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
