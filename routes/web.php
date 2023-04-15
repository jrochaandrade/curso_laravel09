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
//Route::get('/users/{id}', [HomeController::class, 'show'])->name('show'); // Para buscar pela id
Route::get('/users/{user}', [HomeController::class, 'show'])->withTrashed()->name('show'); //Para buscar usuários deletados
Route::get('/user/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/user/update/{id}', [HomeController::class, 'update'])->name('update');
Route::delete('/user/delete/{id}', [HomeController::class, 'destroy'])->name('destroy');

//Agrupando rotas.
/* Route::prefix('users')->controller(HomeController::class)
    ->group(function (){
        Route::get('/add', 'create')->name('create');
        Route::post('/add', 'store')->name('store');
        Route::get('/', 'index')->name('users');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    }); */