<?php

use App\Http\Controllers\SiswaController;
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

Route::get('/', 
    [SiswaController::class, 'index'])->name('index');
Route::get('/siswa/cari', 
    [SiswaController::class, 'search'])->name('cari');

Route::resource('siswa', SiswaController::class);
