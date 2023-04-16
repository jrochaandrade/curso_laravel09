<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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

//Quinta edição renomear rotas com metodo resource

//Route::fallback(function(){
    //dd('Essa rota não existe.');
//}); 

//Route::apiResource('/users', HomeController::class);




//Quarta edição
//Retornar para página inicial se não encontrar o usuário solicitado no show
Route::get('/user/{user}', [HomeController::class, 'show'])
    ->missing(function(){
        return redirect()->route('users');
    })
    ->name('show'); 


//Retornar para página inicial se a rota digitada não existir.
Route::fallback(function(){
    return redirect()->route('users');
}); 


Route::get('/users', [HomeController::class, 'index'])->name('users');
Route::get('/users/add', [HomeController::class, 'create'])->name('create');
Route::post('/users/add', [HomeController::class, 'store'])->name('store');
Route::get('/user/edit/{user}', [HomeController::class, 'edit'])->name('edit');
Route::put('/user/update/{user}', [HomeController::class, 'update'])->name('update');
Route::delete('/user/delete/{user}', [HomeController::class, 'destroy'])->name('destroy');


//Terceira edição bucanco usuário deletados no show por usuário e não id.
/* Route::get('/users/{user}', [HomeController::class, 'show'])->withTrashed()->name('show'); //Buscar usuários deletados
Route::get('/users', [HomeController::class, 'index'])->name('users');
Route::get('/users/add', [HomeController::class, 'create'])->name('create');
Route::post('/users/add', [HomeController::class, 'store'])->name('store');
Route::get('/user/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/user/update/{id}', [HomeController::class, 'update'])->name('update');
Route::delete('/user/delete/{id}', [HomeController::class, 'destroy'])->name('destroy'); */




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



//Primeira criação de rotas
/* Route::get('/users/add', [HomeController::class, 'create'])->name('create');
Route::post('/users/add', [HomeController::class, 'store'])->name('store');
Route::get('/users', [HomeController::class, 'index'])->name('users');
Route::get('/users/{id}', [HomeController::class, 'show'])->name('show');
Route::get('/user/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/user/update/{id}', [HomeController::class, 'update'])->name('update');
Route::delete('/user/delete/{id}', [HomeController::class, 'destroy'])->name('destroy'); */