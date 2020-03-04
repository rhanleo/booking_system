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

Auth::routes();
Route::get('/', 'mainController@index')->name('main');
// Route::middleware('auth:web')->get('/dashboard', 'dashboardController@dashboard')->name('dashboard');
#ADMIN
Route::prefix('admin')->group(function(){
    Route::get('/', 'Admins\adminController@index')->name('admin.index');
    Route::post('/', 'Admins\adminController@login')->name('admin.login');
    Route::get('/create', 'Admins\adminController@create')->name('admin.create');
    Route::post('/register', 'Admins\adminController@register')->name('admin.register');
    Route::post('/logout', 'Admins\adminController@logout')->name('admin.logout');
    Route::middleware('admin')->get('/packages', 'Admins\packageController@index')->name('admin.dashboard');
    Route::middleware('admin')->get('/packages/create', 'Admins\packageController@create')->name('admin.package.create');
    Route::middleware('admin')->post('/packages/add', 'Admins\packageController@add')->name('admin.package.add');
    Route::middleware('admin')->get('/packages/edit/{id}', 'Admins\packageController@edit')->name('admin.package.edit');
    Route::middleware('admin')->post('/packages/update', 'Admins\packageController@update')->name('admin.package.update');
    Route::middleware('admin')->get('/packages/delete/{id}', 'Admins\packageController@delete')->name('admin.package.delete');
    Route::middleware('admin')->get('/customers', 'Admins\customerController@index')->name('admin.customer.index');
    Route::middleware('admin')->get('/vendors', 'Admins\vendorController@index')->name('admin.vendor.index');
    Route::middleware('admin')->get('/vendors/create', 'Admins\vendorController@create')->name('admin.vendor.create');
    Route::middleware('admin')->post('/vendors/add', 'Admins\vendorController@add')->name('admin.vendor.add');
});


