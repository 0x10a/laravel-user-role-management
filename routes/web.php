<?php

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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

/*
 * Routes for Errors
 */
Route::get('401', 'ErrorHandlingController@_401');
Route::get('404', 'ErrorHandlingController@_404');
Route::get('500', 'ErrorHandlingController@_500');


Auth::routes();

/*
 * Starting Routes for UserController
 */

Route::get('/users', 'UserController@index')->name('users');
Route::get('/add_user', 'UserController@add_user')->name('add_user');
Route::post('/add_user', 'UserController@store_user')->name('store_user');
Route::get('/profile/{id}', 'UserController@profile')->name('profile');
Route::patch('/profile/{id}', 'UserController@update_profile')->name('update_profile');
Route::get('/edit_user/{id}', 'UserController@edit_user')->name('edit_user');
Route::patch('/edit_user/{id}', 'UserController@update_user')->name('update_user');
Route::delete('/delete_user/{id}', 'UserController@delete_user')->name('delete_user');

/*
 * Ending Routes for UserController
 */

/*
 * Starting Routes for RolesController
 */

Route::get('/roles', 'RoleController@index')->name('roles');
Route::get('/add_role', 'RoleController@add_role')->name('add_role');
Route::post('/add_role', 'RoleController@store_role')->name('store_role');
Route::get('/edit_role/{id}', 'RoleController@edit_role')->name('edit_role');
Route::patch('/edit_role/{id}', 'RoleController@update_role')->name('update_role');
Route::delete('/delete_role/{id}', 'RoleController@delete_role')->name('delete_role');

/*
 * Ending Routes for RolesController
 */

/*
 * Starting Routes for PermissionsController
 */

Route::get('/permissions', 'PermissionController@index')->name('permissions');
Route::get('/add_permission', 'PermissionController@add_permission')->name('add_permission');
Route::post('/add_permission', 'PermissionController@store_permission')->name('store_permission');
Route::get('/add_permission_by_module', 'PermissionController@add_permission_by_module')->name('add_permission_by_module');
Route::post('/add_permission_by_module', 'PermissionController@store_permission_by_module')->name('store_permission_by_module');
Route::get('/edit_permission/{id}', 'PermissionController@edit_permission')->name('edit_permission');
Route::patch('/edit_permission/{id}', 'PermissionController@update_permission')->name('update_permission');
Route::delete('/delete_permission/{id}', 'PermissionController@delete_permission')->name('delete_permission');

/*
 * Ending Routes for PermissionsController
 */

Route::get('/log', 'LogController@index')->name('log');