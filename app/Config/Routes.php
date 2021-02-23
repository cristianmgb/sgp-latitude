<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
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

// Auth routes
$routes->get('/', 'Auth::index');
$routes->get('/home', 'Auth::home');
$routes->post('login', 'Auth::login');

// Asociados
$routes->get('associates/get_all', 'Associates::get_all');
$routes->get('associates/get_by_id/(:num)', 'Associates::get_by_id/$1');
$routes->resource('associates');

// Contratistas
$routes->get('contractors/get_all', 'Contractors::get_all');
$routes->get('contractors/get_by_id/(:num)', 'Contractors::get_by_id/$1');
$routes->resource('contractors');

// Impuestos
$routes->get('taxes/get_all', 'Taxes::get_all');
$routes->get('taxes/get_by_id/(:num)', 'Taxes::get_by_id/$1');
$routes->resource('taxes');

// Pólizas
$routes->get('policies/get_all', 'Policies::get_all');
$routes->get('policies/get_by_id/(:num)', 'Policies::get_by_id/$1');
$routes->resource('policies');

// Proyectos
$routes->resource('projects');

// Roles
$routes->get('roles/get_all', 'Roles::get_all');
$routes->get('roles/get_by_id/(:num)', 'Roles::get_by_id/$1');
$routes->resource('roles');

// Permisos
$routes->get('permissions/get_all', 'Permissions::get_all');
$routes->get('permissions/get_by_id/(:num)', 'Permisos::get_by_id/$1');
$routes->resource('permissions');

// Usuarios
$routes->get('users/get_all', 'Users::get_all');
$routes->get('users/get_by_id/(:num)', 'Users::get_by_id/$1');
$routes->resource('users');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
