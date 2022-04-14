<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publicdash;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AlatsController;

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

Route::get('/', [Publicdash::class, 'index']);
Route::get('/petaapi', [Publicdash::class, 'api']);

// Route::get('/auth', function () {
//     return view('auth.login', [
//         "title" => "Login"
//     ]);
// });


Route::get('dashboard', [AuthController::class, 'dashboard']);

Route::get('/data-pengguna', [PenggunaController::class, 'index'])->name('data-pengguna');
Route::post('/pengguna/tambah', [PenggunaController::class, 'tambah']);
Route::post('/pengguna/edit', [PenggunaController::class, 'edit']);
Route::post('/pengguna/editpass', [PenggunaController::class, 'editpass']);
Route::post('/pengguna/delete', [PenggunaController::class, 'destroy']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('logout', [AuthController::class, 'signOut'])->name('logout');

// Route::get('data-pengguna', [PenggunaController::class, 'index'])->name('data-pengguna');
Route::get('master-alat', [AlatsController::class, 'index'])->name('master-alat');
Route::get('master-alat/tambah', [AlatsController::class, 'tambah'])->name('master-alat.tambah');
Route::post('master-alat/tambah-proses', [AlatsController::class, 'tambahproses'])->name('master-alat.tambah-proses');
Route::get('master-alat/edit/{id}', [AlatsController::class, 'edit'])->name('master-alat.edit');
Route::post('master-alat/edit-proses', [AlatsController::class, 'editproses'])->name('master-alat.edit-proses');
