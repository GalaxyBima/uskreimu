<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;


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
// Register
// Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
// Route::post('/register', [AuthController::class, 'store'])->name('store');
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login']);

// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Topup
Route::post('/topup', [BankController::class, 'topup'])->name('topup.request');

// Tarik tunai
Route::post('/withdrawal', [BankController::class, 'withdrawal'])->name('withdrawal.request');


// bank
    Route::get('/bank', [DashboardController::class, 'bankIndex'])->name('bank.index');

    // Topup
    Route::get('/bank/topup', [BankController::class, 'bankTopupIndex'])->name('bank.topup');
    Route::put('/bank/konfirmasiTopup/{id}', [BankController::class, 'konfirmasiTopup'])->name('konfirmasi.topup');
    Route::put('/bank/tolakTopup/{id}', [BankController::class, 'tolakTopup'])->name('tolak.topup');

    // Tarik tunai
    Route::get('/bank/withdrawal', [BankController::class, 'bankWithdrawalIndex'])->name('bank.withdrawal');
    Route::put('/bank/konfirmasiWithdrawal/{id}', [BankController::class, 'konfirmasiWithdrawal'])->name('konfirmasi.withdrawal');
    Route::put('/bank/tolakWithdrawal/{id}', [BankController::class, 'tolakWithdrawal'])->name('tolak.withdrawal');

    // LAPORAN
    Route::get('/bank/laporan/topup', [BankController::class, 'laporanTopup'])->name('bank.laporan.topup');
    Route::get('/bank/laporan/withdrawal', [BankController::class, 'laporanWithdrawal'])->name('bank.laporan.withdrawal');
    Route::get('/bank/withdrawal/cetak', [BankController::class, 'cetakWithdrawal'])->name('cetak.withdrawal');
    Route::get('/bank/topup/cetak', [bankController::class, 'cetakTopup'])->name('cetak.topup');

// kantin
    Route::get('/kantin', [DashboardController::class, 'kantinIndex'])->name('kantin.index');
    Route::resource('/kantin/produk', ProdukController::class);
    Route::resource('/kantin/kategori', KategoriController::class);
    Route::get('/kantin/laporan', [TransaksiController::class, 'laporanTransaksi'])->name('laporan.transaksi');
    Route::get('/kantin/transaksi/cetak', [TransaksiController::class, 'cetakTransaksi'])->name('cetak.transaksi');

// customer
    Route::get('/customer', [DashboardController::class, 'customerIndex'])->name('customer.index');

    // Transaksi
    Route::get('/customer/canteen', [TransaksiController::class, 'index'])->name('canteen.index');
    Route::get('/customer/keranjang', [TransaksiController::class, 'keranjangIndex'])->name('keranjang.index');
    Route::post('/customer/tambahKeKeranjang/{id}', [TransaksiController::class, 'addToCart'])->name('addToCart');
    Route::delete('/customer/keranjang/destroy/{id}', [TransaksiController::class, 'keranjangDestroy'])->name('keranjang.destroy');
    Route::post('/customer/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
   Route::get('/customer/transaksi/cetak', [TransaksiController::class, 'cetakTransaksi'])->name('cetak.transaksi');

    // Riwayat transaksi
    Route::get('/customer/riwayat/transaksi', [TransaksiController::class, 'laporanTransaksiHarian'])->name('customer.riwayat.transaksi');
    Route::get('/customer/riwayat/transaksi/{invoice}', [TransaksiController::class, 'detailRiwayatTransaksi'])->name('customer.transaksi.detail');
    Route::get('/customer/riwayat/topup', [BankController::class, 'riwayatTopup'])->name('customer.riwayat.topup');
    Route::get('/customer/riwayat/withdrawal', [BankController::class, 'riwayatWithdrawal'])->name('customer.riwayat.withdrawal');
