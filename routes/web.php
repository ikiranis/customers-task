<?php

use App\Http\Controllers\CustomerController;
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
    return redirect('/customers/');
});

Route::get('/index/{filter?}', [CustomerController::class, 'index'])->name('index');
Route::get('importPayments', [CustomerController::class, 'importPayments'])->name('importPayments');
Route::get('exportCustomers', [CustomerController::class, 'exportCustomers'])->name('exportCustomers');


Route::resource('customers', CustomerController::class);

