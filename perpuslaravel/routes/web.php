<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PinjamanController;


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

// Route::get('/', function () {
//     return view('user.main');
// });


//route untuk loginn
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


//route untuk layout
Route::controller(LayoutController::class)->group(function () {
    Route::get('/', [LayoutController::class, 'index']);
    Route::get('/book', [LayoutController::class, 'buku']);
    Route::get('/kategori/buku/{kategori}', [LayoutController::class, 'kategori'])->name('/kategori/buku/');
    Route::get('/about', [LayoutController::class, 'about']);
    Route::get('/bukudetail/{id}', [LayoutController::class, 'details']);
    Route::get('pinjam',  [UsersController::class, 'pinjaman']);
    Route::post('userpinjam/simpan', [UsersController::class, 'store'])->name('userpinjam/simpan');
    Route::post('bukupinjam/{id}', [LayoutController::class, 'simpan'])->name('bukupinjam');
});

Route::get('profil',  [UsersController::class, 'user']);

//route data buku
Route::middleware('auth', 'only_admin')->group(function () {

    Route::get('dashboard',  [BukuController::class, 'dashboard']);
    Route::get('buku',  [BukuController::class, 'index']);
    Route::get('buku/create',  [BukuController::class, 'create']);
    Route::post('buku/simpan',  [BukuController::class, 'store'])->name('buku/simpan');
    Route::get('buku/detail/{id}',  [BukuController::class, 'detail'])->name('buku/detail');
    Route::get('buku/ubah/{id}',  [BukuController::class, 'ubah'])->name('buku/edit');
    Route::post('buku/update/{id}',  [BukuController::class, 'update'])->name('buku/update');
    Route::get('buku/hapus/{id}',  [BukuController::class, 'remove'])->name('buku/hapus');

    //kategori
    Route::get('kategori',  [KategoriController::class, 'kategori']);
    Route::post('kategori/tambah',  [KategoriController::class, 'tambah'])->name('kategori/tambah');
    Route::post('kategori/edit/{id}',  [KategoriController::class, 'edit'])->name('kategori/edit');
    Route::get('kategori/hapus/{id}',  [KategoriController::class, 'destroy'])->name('kategori/hapus');

    //rak
    Route::get('rak',  [RakController::class, 'rak']);
    Route::post('rak/tambah',  [RakController::class, 'add'])->name('rak/tambah');
    Route::post('rak/edit/{id}',  [RakController::class, 'rubah'])->name('rak/edit');
    Route::get('rak/hapus/{id}',  [RakController::class, 'delete'])->name('rak/hapus');

    //kelolauser
    Route::get('user',  [UsersController::class, 'index']);
    Route::get('detail/{id}',  [UsersController::class, 'profil'])->name('detail');





    //data pinjaman
    Route::get('data/pinjam', [PinjamanController::class, 'index']);

    //export
    Route::get('data/pinjam/export-pdf', [PinjamanController::class, 'pdf']);
    //
    Route::post('pinjam/simpan', [PinjamanController::class, 'store'])->name('pinjam/simpan');

    Route::post('kembali/simpan', [PinjamanController::class, 'simpan'])->name('kembali/simpan');

    Route::get('detail-pinjam/{id}',   [PinjamanController::class,  'detail'])->name('detail-pinjam');

    Route::post('bukukembali/{id}', [PinjamanController::class,  'save'])->name('bukukembali');

    Route::get('riwayatpinjam', [PinjamanController::class, 'kembali']);

    Route::get('form-pinjam', [PinjamanController::class, 'form']);

    Route::get('form-kembali', [PinjamanController::class, 'formr']);

    //export
    Route::get('data/pinjam/export-pdf', [PinjamanController::class, 'pdf']);
});
