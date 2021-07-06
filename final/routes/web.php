<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function (){
    Route::get('/',[\App\Http\Controllers\ProductController::class, 'index'])->name('index');
    Route::get('create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create');
    Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('show');
    Route::post('product/save', [\App\Http\Controllers\ProductController::class, 'store'])->name('save');
    Route::get('product/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
    Route::put('product/{id}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('update');
    Route::delete('product/{id}/delete', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('delete');
});
