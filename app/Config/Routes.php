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
$routes->setDefaultController('Admin');
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
$routes->get('/', 'Admin::index');

// Auth routes
$routes->get('/login', 'Auth::login');
$routes->get('/forget', 'Auth::forget');
$routes->get('/forget', 'Auth::add');
$routes->get('/change', 'Auth::change_password');

/**
 *  Admin Routes
 * */
$routes->group('admin', function($routes)
{
	$routes->get('inicio', 'Admin::index');

	// Asociados
	$routes->get('asociados',                   'Associate::index');
	$routes->get('asociado/nuevo',              'Associate::new');
	$routes->post('asociado/create',            'Associate::create');
	$routes->post('asociado',                   'Associate::create');   // alias
	$routes->get('asociado/show/(:segment)',    'Associate::show/$1');
	$routes->get('asociado/(:segment)',         'Associate::show/$1');  // alias
	$routes->get('asociado/edit/(:segment)',    'Associate::edit/$1');
	$routes->post('asociado/update/(:segment)', 'Associate::update/$1');
	$routes->get('asociado/remove/(:segment)',  'Associate::remove/$1');
	$routes->post('asociado/delete/(:segment)', 'Associate::delete/$1');

	// Contratistas
	$routes->get('contratistas',                   'Constractor::index');
	$routes->get('contratista/nuevo',              'Constractor::new');
	$routes->post('contratista/create',            'Constractor::create');
	$routes->post('contratista',                   'Constractor::create');   // alias
	$routes->get('contratista/show/(:segment)',    'Constractor::show/$1');
	$routes->get('contratista/(:segment)',         'Constractor::show/$1');  // alias
	$routes->get('contratista/edit/(:segment)',    'Constractor::edit/$1');
	$routes->post('contratista/update/(:segment)', 'Constractor::update/$1');
	$routes->get('contratista/remove/(:segment)',  'Constractor::remove/$1');
	$routes->post('contratista/delete/(:segment)', 'Constractor::delete/$1');

	$routes->get('impuestos', 'Tax::index');
	$routes->get('polizas', 'Policies::index');

	// Proyectos4e
	$routes->get('proyectos',                   'Project::index');
	$routes->get('proyecto/nuevo',              'Project::new');
	$routes->post('proyecto/create',            'Project::create');
	$routes->post('proyecto',                   'Project::create');   // alias
	$routes->get('proyecto/show/(:segment)',    'Project::show/$1');
	$routes->get('proyecto/(:segment)',         'Project::show/$1');  // alias
	$routes->get('proyecto/edit/(:segment)',    'Project::edit/$1');
	$routes->post('proyecto/update/(:segment)', 'Project::update/$1');
	$routes->get('proyecto/remove/(:segment)',  'Project::remove/$1');
	$routes->post('proyecto/delete/(:segment)', 'Project::delete/$1');

	$routes->get('roles', 'Rol::index');
	
	// Usuarios
	$routes->get('usuarios',                   'User::index');
	$routes->get('usuario/nuevo',              'User::new');
	$routes->post('usuario/create',            'User::create');
	$routes->post('usuario',                   'User::create');   // alias
	$routes->get('usuario/show/(:segment)',    'User::show/$1');
	$routes->get('usuario/(:segment)',         'User::show/$1');  // alias
	$routes->get('usuario/edit/(:segment)',    'User::edit/$1');
	$routes->post('usuario/update/(:segment)', 'User::update/$1');
	$routes->get('usuario/remove/(:segment)',  'User::remove/$1');
	$routes->post('usuario/delete/(:segment)', 'User::delete/$1');
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
