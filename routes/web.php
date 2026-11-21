
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama' => 'Sendy Prayogo',
        'kelas' => 'TSM-00',
        'nim' => '0123456789',
    ]);
});

Route::view('/contact', 'pages.contact');

// Menampilkan data produk
Route::get('/product', [ProductController::class, 'index']);

// Menampilkan form tambah produk
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);

// Menyimpan data produk ke database
Route::post('/product', [ProductController::class, 'store']);

// Detail produk
Route::get('/product/{id}', [ProductController::class, 'show']);

// Form edit produk
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);

// Simpan perubahan
Route::put('/product/{id}', [ProductController::class, 'update']);

// Hapus produk
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

// Routing kategori
Route::resource('/category', CategoryController::class);