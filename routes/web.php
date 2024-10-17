<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;


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

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/pinjam', function () {
    return view('pages.peminjaman');
});


Route::prefix('/data-buku')->name('data_buku.')->group(function(){
    Route::get('/data', [BukuController::class, 'index'])->name('data');
    Route::get('/tambah', [BukuController::class, 'create'])->name('tambah');
    Route::post('/tambah/proses', [BukuController::class, 'store'])->name('tambah.proses');
    Route::get('/ubah/{id}', [BukuController::class, 'edit'])->name('ubah');
    Route::patch('/ubah/{id}/proses', [BukuController::class, 'update'])->name('ubah.proses');
    Route::delete('/hapus/{id}', [BukuController::class, 'destroy'])->name('hapus');
    Route::patch('/ubah/stok/{id}', [BukuController::class, 'updateStock'])->name('ubah.stok');
    Route::get('/books', [BukuController::class, 'index'])->name('books');

});
// Route::get('/books', [BukuController::class, 'index']);
Route::prefix('/peminjaman-buku')->name('peminjaman_buku.')->group(function(){

    Route::get('/data', [PinjamController::class, 'index'])->name('data');
    Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam');
    Route::get('/tambah', [PinjamController::class, 'create'])->name('tambah');
    Route::post('/tambah/proses', [PinjamController::class, 'store'])->name('tambah.proses');
    Route::get('/ubah/{id}', [PinjamController::class, 'edit'])->name('ubah');
    Route::patch('/ubah/{id}/proses', [PinjamController::class, 'update'])->name('ubah.proses');
    Route::delete('/hapus/{id}', [PinjamController::class, 'destroy'])->name('hapus');
    Route::patch('/ubah/stok/{id}', [PinjamController::class, 'updateStock'])->name('ubah.stok');

});

