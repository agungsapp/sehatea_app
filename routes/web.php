<?php

use App\Http\Controllers\Admin\AdminBahanController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKomposisiController;
use App\Http\Controllers\Admin\AdminPembelianBahanController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminStokBahanController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::prefix('/admin')->name('admin.')->middleware(['admin', 'auth'])->group(function () {
    Route::resource('dashboard', AdminDashboardController::class);
    Route::resource('produk', AdminProdukController::class);
    Route::resource('bahan', AdminBahanController::class);
    Route::resource('stok', AdminStokBahanController::class);
    Route::resource('pembelian-bahan', AdminPembelianBahanController::class);
    Route::resource('komposisi', AdminKomposisiController::class);
});


// new route start
Route::get('test', function () {
    return view('admin.dashboard.index');
});
// new route end

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
