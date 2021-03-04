<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\ContractorsController;
use App\Http\Controllers\TaxesController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\ProjectsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::resource('home'        , HomeController::class);
	Route::resource('menus' 	  , MenusController::class);
	Route::resource('permissions' , PermissionsController::class);
	Route::resource('roles'	 	  , RolesController::class);
	Route::resource('users'       , UsersController::class);
	// Modulos
	Route::resource('associates'  , AssociatesController::class);
	Route::resource('contractors' , ContractorsController::class);
	Route::resource('taxes'       , TaxesController::class);
	Route::resource('policies'    , PoliciesController::class);
	Route::resource('projects'    , ProjectsController::class);
});

// Route::group(['middleware' => ['role:super-admin']], function () {
//     //
// });

// Route::group(['middleware' => ['role:admin']], function () {
//     //
// });

// Route::group(['middleware' => ['role:gestor']], function () {
//     //
// });