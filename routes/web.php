<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('companies', 'CompanyController');
Route::post('/companies/create', 'CompanyController@store');
Route::post('/companies/update', 'CompanyController@update');
Route::post('/companies/{company}/destroy', 'CompanyController@destroy');


Route::resource('employees', 'EmployeeController');

Route::resource('roles', 'RoleController');
Route::post('/roles/create', 'RoleController@store');
