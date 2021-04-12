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
Route::get('/companies/archive', 'CompanyController@archive')->name('companies.archive');
Route::get('/companies/{company}/delete', 'CompanyController@delete')->name('companies.delete');
Route::get('/companies/{company}/restore', 'CompanyController@restore')->name('companies.restore');
Route::post('/companies/{company}/add', 'EmployeeController@store');
Route::resource('companies', 'CompanyController');
Route::post('/companies/create', 'CompanyController@store');
Route::post('/companies/update', 'CompanyController@update');
Route::post('/companies/{company}/destroy', 'CompanyController@destroy');




Route::get('/employees/archive', 'EmployeeController@archive')->name('employees.archive');
Route::get('/employees/{employees}/delete', 'EmployeeController@delete')->name('employees.delete');
Route::get('/employees/{employees}/restore', 'EmployeeController@restore')->name('employees.restore');
Route::resource('employees', 'EmployeeController');
Route::post('/employees/create', 'EmployeeController@store');
Route::post('/employees/create', 'EmployeeController@store');
Route::post('/employees/update', 'EmployeeController@update');
Route::post('/employees/{employee}/destroy', 'EmployeeController@destroy');
Route::post('/employees/test', 'EmployeeController@test');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('companies', CompanyController::class);
});

