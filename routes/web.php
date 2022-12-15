<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FromController;


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

Route::get('/form', [FromController::class, 'index'])->name('user.form');

Route::post('user/form', [FromController::class, 'store']);

Route::get('user/show', [FromController::class, 'show'])->name('user.show');

Route::get('user/edit/{id}', [FromController::class, 'edit']);

Route::post('user/update/{id}', [FromController::class, 'update'])->name('user.update');




Route::get('user/delete/{id}', [FromController::class, 'delete']);

