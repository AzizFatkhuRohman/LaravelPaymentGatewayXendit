<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagihanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class,'before']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/listTagihan', [TagihanController::class, 'list'])->name('tagihan.list');
    Route::get('/bayar/{id}', [TagihanController::class, 'bayar'])->name('tagihan.bayar');
    Route::post('/store', [TagihanController::class, 'store'])->name('tagihan.store');
    Route::post('/callback', [TagihanController::class, 'callback']);
