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
$routes->get('/admin', 'Admin::index');

// Auth routes
$routes->get('/login', 'Auth::login');

/**
 *  Admin Routes
 * */
$routes->group('admin', function($routes)
{
	// Asociados
	$routes->get('asociados',                   'Associate::index');
	$routes->get('asociado/nuevo',              'Associate::new');
	$routes->post('asociado/create',            'Associate::create');
	$routes->get('asociado/show/(:segment)',    'Associate::show/$1');
	$routes->get('asociado/edit/(:segment)',    'Associate::edit/$1');
	$routes->post('asociado/update/(:segment)', 'Associate::update/$1');
	$routes->post('asociado/delete/(:segment)', 'Associate::delete/$1');
	$routes->get('asociado/getAll', 			'Associate::get_all_associates');
	$routes->get('asociado/getById/(:segment)', 'Associate::get_associate_by_id/$1');

	// Contratistas
	$routes->get('contratistas',                   'Contractor::index');
	$routes->post('contratista/create',            'Contractor::create');
	$routes->post('contratista/update/(:segment)', 'Contractor::update/$1');
	$routes->post('contratista/delete/(:segment)', 'Contractor::delete/$1');
	$routes->get('contratista/getAll', 			   'Contractor::get_all_contractors');
	$routes->get('contratista/getById/(:segment)', 'Contractor::get_contractor_by_id/$1');

	// Impuestos
	$routes->get('impuestos',                   'Tax::index');
	$routes->get('impuesto/nuevo',              'Tax::new');
	$routes->post('impuesto/create',            'Tax::create');
	$routes->get('impuesto/show/(:segment)',    'Tax::show/$1');
	$routes->get('impuesto/edit/(:segment)',    'Tax::edit/$1');
	$routes->post('impuesto/update/(:segment)', 'Tax::update/$1');
	$routes->post('impuesto/delete/(:segment)', 'Tax::delete/$1');
	$routes->get('impuesto/getAll', 			'Tax::get_all_taxes');
	$routes->get('impuesto/getById/(:segment)', 'Tax::get_tax_by_id/$1');

	// Pólizas
	$routes->get('polizas',                   'Policies::index');
	$routes->post('poliza/create',            'Policies::create');
	$routes->get('poliza/edit/(:segment)',    'Policies::edit/$1');
	$routes->post('poliza/update/(:segment)', 'Policies::update/$1');
	$routes->post('poliza/delete/(:segment)', 'Policies::delete/$1');
	$routes->get('poliza/getAll', 			  'Policies::get_all_policies');
	$routes->get('poliza/getById/(:segment)', 'Policies::get_policy_by_id/$1');

	// Proyectos
	$routes->get('proyectos',                   'Project::index');
	$routes->get('proyecto/nuevo',              'Project::new');
	$routes->post('proyecto/create',            'Project::create');
	$routes->get('proyecto/show/(:segment)',    'Project::show/$1');
	$routes->get('proyecto/edit/(:segment)',    'Project::edit/$1');
	$routes->post('proyecto/update/(:segment)', 'Project::update/$1');
	$routes->post('proyecto/delete/(:segment)', 'Project::delete/$1');

	// Roles
	$routes->get('roles',                  'Rol::index');
	$routes->post('rol/create',            'Rol::create');
	$routes->get('rol/edit/(:segment)',    'Rol::edit/$1');
	$routes->post('rol/update/(:segment)', 'Rol::update/$1');
	$routes->post('rol/delete/(:segment)', 'Rol::delete/$1');
	$routes->get('rol/getAll', 			   'Rol::get_all_roles');
	$routes->get('rol/getById/(:segment)', 'Rol::get_rol_by_id/$1');
	
	// Usuarios
	$routes->get('usuarios',                   'User::index');
	$routes->get('usuario/nuevo',              'User::new');
	$routes->post('usuario/create',            'User::create');
	$routes->get('usuario/show/(:segment)',    'User::show/$1');
	$routes->get('usuario/edit/(:segment)',    'User::edit/$1');
	$routes->post('usuario/update/(:segment)', 'User::update/$1');
	$routes->post('usuario/delete/(:segment)', 'User::delete/$1');
	$routes->get('usuarios/getAll', 		   'User::get_all_users');
	$routes->get('usuarios/getById/(:segment)','User::get_user_by_id/$1');
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
