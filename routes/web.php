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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Companies routes

Route::post('/companies/addcompany', [App\Http\Controllers\CompanyController::class, 'add'])->middleware('auth')->name('addcompany');

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->middleware('auth')->name('companies');

Route::put('companies/updatecompany/{id}',[App\Http\Controllers\CompanyController::class, 'update'])->middleware('auth')->name('updatecompany');

Route::delete('companies/deletecompany/{id}',[App\Http\Controllers\CompanyController::class, 'delete'])->middleware('auth')->name('deletecompany');

// Employees Routes

Route::post('/employees/addemployee', [App\Http\Controllers\EmployeeController::class, 'add'])->middleware('auth')->name('addemployee');

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->middleware('auth')->name('employees');

Route::put('employees/updateemployee/{id}',[App\Http\Controllers\EmployeeController::class, 'update'])->middleware('auth')->name('updateemployee');

Route::delete('employees/deleteemployee/{id}',[App\Http\Controllers\EmployeeController::class, 'delete'])->middleware('auth')->name('deleteemployee');
