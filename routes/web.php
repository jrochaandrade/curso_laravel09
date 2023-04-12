<?php

use App\Http\Controllers\HomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/users/add', [HomeController::class, 'create'])->name('create');
Route::post('/users/add', [HomeController::class, 'store'])->name('store');
Route::get('/users', [HomeController::class, 'index'])->name('users');
Route::get('/users/{id}', [HomeController::class, 'show'])->name('show');
Route::get('/users/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/users/update/{id}', [HomeController::class, 'update'])->name('update');
Route::delete('/users/delete/{id}', [HomeController::class, 'destroy'])->name('destroy');