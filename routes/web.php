<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FroalaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProgramDesaController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\UserProfileController;
use App\Models\Berita;
use App\Models\ProgramDesa;
use App\Models\Umkm;
use Illuminate\Auth\Events\Login;

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
//     return view('welcome');
// });


//home
Route::get('/', [HomeController::class, 'index']);
Route::get('/struktur-pemerintahan', [PemerintahanController::class, 'index']);
Route::get('/program-desa', [ProgramDesaController::class, 'index']);
Route::get('/program-desa/read/{id:slug}', [ProgramDesaController::class, 'read']);
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/read/{id:slug}', [BeritaController::class, 'read']);
Route::get('/umkm', [UmkmController::class, 'index']);
Route::get('/umkm/view/{id:slug}', [UmkmController::class, 'read']);
Route::get('/umkm/redirect/{id:slug}', [UmkmController::class, 'redirect']);
Route::get('/galeri', [GalleryController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);

Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'save']);
});
Route::middleware('admin')->group(function(){
    Route::post('/uploadImageFroala', [FroalaController::class, 'uploadImageFroala']);
    Route::get('/admin', [DashboardController::class, 'index']);

    Route::get('/admin/struktur-pemerintahan', [PemerintahanController::class, 'adminIndex']);
    Route::get('/admin/struktur-pemerintahan/tambah-data', [PemerintahanController::class, 'create']);
    Route::post('/admin/struktur-pemerintahan/tambah-data', [PemerintahanController::class, 'store']);
    Route::get('/admin/struktur-pemerintahan/edit/{id}', [PemerintahanController::class, 'edit']);
    Route::post('/admin/struktur-pemerintahan/edit/{id}', [PemerintahanController::class, 'update']);
    Route::post('/admin/struktur-pemerintahan/hapus/{id}', [PemerintahanController::class, 'delete']);

    Route::get('/admin/berita', [BeritaController::class, 'adminIndex']);
    Route::get('/admin/berita/tambah-data', [BeritaController::class, 'create']);
    Route::post('/admin/berita/tambah-data', [BeritaController::class, 'store']);
    Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::post('/admin/berita/edit/{id}', [BeritaController::class, 'update']);
    Route::post('/admin/berita/hapus/{id}', [BeritaController::class, 'hapus']);

    Route::get('/admin/kategori-berita', [BeritaController::class, 'kategoriBerita']);
    Route::get('/admin/kategori-berita/add', [BeritaController::class, 'createKategori']);
    Route::post('/admin/kategori-berita/add', [BeritaController::class, 'storeKategori']);
    Route::get('/admin/kategori-berita/edit/{id}', [BeritaController::class, 'editKategori']);
    Route::post('/admin/kategori-berita/edit/{id}', [BeritaController::class, 'updateKategori']);
    Route::post('/admin/kategori-berita/hapus/{id}', [BeritaController::class, 'hapusKategori']);

    Route::get('/admin/umkm', [UmkmController::class, 'adminIndex']);
    Route::get('/admin/umkm/tambah-data', [UmkmController::class, 'create']);
    Route::post('/admin/umkm/tambah-data', [UmkmController::class, 'store']);
    Route::get('/admin/umkm/edit/{id:slug}', [UmkmController::class, 'edit']);
    Route::post('/admin/umkm/edit/{id:slug}', [UmkmController::class, 'update']);
    Route::post('/admin/umkm/hapus/{id:slug}', [UmkmController::class, 'delete']);

    Route::get('/admin/galeri', [GalleryController::class, 'adminIndex']);
    Route::get('/admin/galeri/tambah-data', [GalleryController::class, 'create']);
    Route::post('/admin/galeri/tambah-data', [GalleryController::class, 'store']);
    Route::get('/admin/galeri/edit/{id:slug}', [GalleryController::class, 'edit']);
    Route::post('/admin/galeri/edit/{id:slug}', [GalleryController::class, 'update']);
    Route::post('/admin/galeri/hapus/{id:slug}', [GalleryController::class, 'hapus']);


    Route::get('/admin/profile-desa', [ProfileController::class, 'adminIndex']);
    Route::post('/admin/profile/add', [ProfileController::class, 'add']);
    Route::post('/admin/profile/edit/{id}', [ProfileController::class, 'update']);

    Route::get('/admin/program-kerja', [ProgramDesaController::class, 'adminIndex']);
    Route::get('/admin/program-kerja/tambah-data', [ProgramDesaController::class, 'create']);
    Route::post('/admin/program-kerja/tambah-data', [ProgramDesaController::class, 'store']);
    Route::get('/admin/program-kerja/edit/{id:slug}', [ProgramDesaController::class, 'edit']);
    Route::post('/admin/program-kerja/edit/{id:slug}', [ProgramDesaController::class, 'update']);
    Route::post('/admin/program-kerja/hapus/{id}', [ProgramDesaController::class, 'delete']);

    Route::get('/admin/user/profile', [UserProfileController::class, 'index']);
    Route::post('/admin/user/profile', [UserProfileController::class, 'update']);

    
    Route::get('/admin/carousel', [HomeController::class, 'indexCarousel']);
    Route::get('/admin/carousel/edit/{id}', [HomeController::class, 'editCarousel']);
    Route::post('/admin/carousel/edit/{id}', [HomeController::class, 'updateCarousel']);
    Route::post('/admin/carousel/edit-tulisan', [HomeController::class, 'updateTulisan']);

});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [LoginController::class, 'logout']);
});
