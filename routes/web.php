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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/companies/{company}/add', 'CompanyController@add')->name('companies.add');
Route::post('/companies/{company}/add', 'EmployeeController@store');
Route::resource('companies', 'CompanyController');
Route::post('/companies/create', 'CompanyController@store');
Route::post('/companies/update', 'CompanyController@update');
Route::post('/companies/{company}/destroy', 'CompanyController@destroy');



Route::resource('employees', 'EmployeeController');
Route::post('/employees/create', 'EmployeeController@store');
Route::post('/employees/create', 'EmployeeController@store');
Route::post('/employees/update', 'EmployeeController@update');
Route::post('/employees/{employee}/destroy', 'EmployeeController@destroy');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

