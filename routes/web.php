<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Santri\SantriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Santri\PelanggaranController;
use App\Http\Controllers\Santri\PrestasiController;
use App\Http\Controllers\Santri\MutabaahController;
use App\Http\Controllers\Santri\NilaiController;
use App\Http\Controllers\DonaturController;

//Forgot PasswordController'
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Admin Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMutabaahController;
use App\Http\Controllers\Admin\AdminPelanggaranController;
use App\Http\Controllers\Admin\AdminPrestasiController;
use App\Http\Controllers\Admin\AdminNilaiController;

// Import Controller
use App\Http\Controllers\SantriImportController;

// Auth Controller
use App\Http\Controllers\Auth\RegisteredUserController;

// Setting Controller
use App\Http\Controllers\SettingsController;


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

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // import
    Route::post('/import/akun', [AdminController::class, 'import'])->name('admin.import.akun');
    Route::post('/import/santri', [AdminController::class, 'importSantri'])->name('admin.import.santri');
    Route::post('/import/pelanggaran', [AdminPelanggaranController::class, 'import'])->name('admin.import.pelanggaran');
    Route::post('/import/prestasi', [AdminPrestasiController::class, 'import'])->name('admin.import.prestasi');
    Route::post('/import/nilai', [AdminNilaiController::class, 'import'])->name('admin.import.nilai');

    //chart
    Route::get('/get-dates-by-month/{month}', [SantriController::class, 'getDatesByMonth'])->name('get-dates-by-month');
    
    // DASHBOARD
    Route::get('/admindashboard', [AdminController::class, 'dashboard'])->name('admindashboard');

    // search
    Route::get('/dashboard/search', [AdminController::class, 'search'])->name('search');

    // Data Akun 
    Route::get('/dashboard/admin/akun', [AdminController::class, 'index_akun'])->name('adminakun');
    Route::get('/dashboard/admin/akun/create', [AdminController::class, 'create_akun'])->name('adminakun.create');
    Route::post('/dashboard/admin/akun/store', [AdminController::class, 'store_akun'])->name('adminakun.store');
    Route::get('/dashboard/admin/akun/edit/{id}', [AdminController::class, 'edit_akun'])->name('adminakun.edit');
    Route::put('/dashboard/admin/akun/update/{id}', [AdminController::class, 'update_akun'])->name('adminakun.update');
    Route::delete('/dashboard/admin/akun/delete/{id}', [AdminController::class, 'destroy_akun'])->name('adminakun.delete');

    // DATA SANTRI
    Route::get('/dashboard/admin/santri', [AdminController::class, 'index'])->name('adminsantri');
    Route::get('/dashboard/admin/santri/create', [AdminController::class, 'create'])->name('admintambahsantri');
    Route::post('/dashboard/admin/santri/store', [AdminController::class, 'store'])->name('adminstoretambah');
    Route::post('/dashboard/admin/santri/store', [AdminController::class, 'storeById'])->name('adminStoreById');
    Route::get('/dashboard/admin/santri/edit/{id}', [AdminController::class, 'edit'])->name('admineditsantri');
    Route::put('/dashboard/admin/santri/update/{id}', [AdminController::class, 'update'])->name('adminupdatesantri');
    Route::get('/dashboard/admin/santri/show/{id}', [AdminController::class, 'show'])->name('admindetailsantri');
    Route::delete('/dashboard/admin/santri/delete/{id}', [AdminController::class, 'destroy'])->name('adminhapussantri');

    // pelanggaran
    Route::get('/dashboard/admin/pelanggaran', [AdminPelanggaranController::class, 'index'])->name('adminpelanggaran');
    Route::get('/dashboard/admin/pelanggaran/create', [AdminPelanggaranController::class, 'create'])->name('admintambahpelanggaran');
    Route::post('/dashboard/admin/pelanggaran/store', [AdminPelanggaranController::class, 'store'])->name('adminstorepelanggaran');
    Route::get('/dashboard/admin/pelanggaran/edit/{id}', [AdminPelanggaranController::class, 'edit'])->name('admineditpelanggaran');
    Route::put('/dashboard/admin/pelanggaran/update/{id}', [AdminPelanggaranController::class, 'update'])->name('adminupdatepelanggaran');
    Route::get('/dashboard/admin/pelanggaran/show/{id}', [AdminPelanggaranController::class, 'show'])->name('admindetailpelanggaran');
    Route::delete('/dashboard/admin/pelanggaran/delete/{id}', [AdminPelanggaranController::class, 'destroy'])->name('adminhapuspelanggaran');

    // prestasi
    Route::get('/dashboard/admin/prestasi', [AdminPrestasiController::class, 'index'])->name('adminprestasi');
    Route::get('/dashboard/admin/prestasi/show/{id}', [AdminPrestasiController::class, 'show'])->name('admindetailprestasi');
    Route::get('/dashboard/admin/prestasi/create', [AdminPrestasiController::class, 'create'])->name('admintambahprestasi');
    Route::post('/dashboard/admin/prestasi/store', [AdminPrestasiController::class, 'store'])->name('adminstoreprestasi');
    Route::get('/dashboard/admin/prestasi/edit/{id}', [AdminPrestasiController::class, 'edit'])->name('admineditprestasi');
    Route::put('/dashboard/admin/prestasi/update/{id}', [AdminPrestasiController::class, 'update'])->name('adminupdateprestasi');
    Route::delete('/dashboard/admin/prestasi/delete/{id}', [AdminPrestasiController::class, 'destroy'])->name('adminhapusprestasi');

    // nilai
    Route::get('/dashboard/admin/nilai', [AdminNilaiController::class, 'index'])->name('adminnilai');
    Route::get('/dashboard/admin/nilai/create', [AdminNilaiController::class, 'create'])->name('admintambahnilai');
    Route::post('/dashboard/admin/nilai/store', [AdminNilaiController::class, 'store'])->name('adminstorenilai');
    Route::get('/dashboard/admin/nilai/edit/{id}', [AdminNilaiController::class, 'edit'])->name('admineditnilai');
    Route::put('/dashboard/admin/nilai/update/{id}', [AdminNilaiController::class, 'update'])->name('adminupdatenilai');
    Route::delete('/dashboard/admin/nilai/delete/{id}', [AdminNilaiController::class, 'destroy'])->name('adminhapusnilai');

    // mutabaah
    Route::get('/dashboard/admin/mutabaah', [AdminMutabaahController::class, 'index'])->name('adminmutabaah');
    Route::get('/dashboard/admin/mutabaah/detail/{id}', [AdminMutabaahController::class, 'detail'])->name('adminmutabaahdetail');
    Route::get('/dashboard/admin/mutabaah/getMonths/{id}', [AdminMutabaahController::class, 'getMonths'])->name('getMonths');
    Route::get('/dashboard/admin/mutabaah/create/{id}', [AdminMutabaahController::class, 'create'])->name('tambahMutabaah');
    Route::post('/dashboard/admin/mutabaah/store', [AdminMutabaahController::class, 'store'])->name('storeMutabaah');
    Route::get('/dashboard/admin/mutabaah/edit/{id}', [AdminMutabaahController::class, 'edit'])->name('editMutabaah');
    Route::put('/dashboard/admin/mutabaah/update/{id}', [AdminMutabaahController::class, 'update'])->name('updateMutabaah');
    Route::delete('/dashboard/admin/mutabaah/delete/{id}', [AdminMutabaahController::class, 'destroy'])->name('hapusMutabaah');
});

Route::middleware(['auth', 'role:santri'])->group(function () {

    //Import Pelanggaran & Prestasi
    Route::post('/import-pelanggaran', [PelanggaranController::class, 'import'])->name('importpelanggaran');
    Route::post('/import-prestasi', [PrestasiController::class, 'import'])->name('importprestasi');
    Route::post('/import-santri', [SantriController::class, 'import'])->name('importsantri');
    Route::post('/store-santri', [SantriController::class, 'store'])->name('storeSantri');

    //chart
    Route::get('/get-dates-by-month/{month}', [SantriController::class, 'getDatesByMonth'])->name('get-dates-by-month');

    //Forgot password
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    //Upload Photo for Excel Import
    Route::get('/upload-photo', function () {
        return view('upload_photo');
    });
    Route::post('/upload-photo', [SantriImportController::class, 'uploadPhoto'])->name('upload.photo');


    // SettingsPage
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    //DeleteAllData
    Route::delete('/santri/delete-all', [SantriController::class, 'deleteAll'])->name('santri.deleteAll');

    // Rute untuk menampilkan form import Excel
    Route::get('/santri/import', [SantriImportController::class, 'showImportForm'])->name('santri.import');

    // Rute untuk menghandle proses import Excel
    Route::post('/santri/import', [SantriImportController::class, 'import'])->name('santri.import.post');

    // setting
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    // DASHBOARD
    Route::get('/dashboard', [SantriController::class, 'dashboard'])->name('santridashboard');

    // search
    Route::get('/dashboard/santri/search', [SantriController::class, 'search'])->name('santri.search');

    // DATA SANTRI
    Route::get('/dashboard/santri', [SantriController::class, 'index'])->name('santri');
    Route::get('/dashboard/profile/{id}', [SantriController::class, 'show'])->name('detailsantri');

    // pelanggaran
    Route::get('/dashboard/santri/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran');

    // prestasi
    Route::get('/dashboard/santri/prestasi', [PrestasiController::class, 'index'])->name('prestasi');

    // mutabaah
    Route::get('/dashboard/santri/mutabaah', [MutabaahController::class, 'index'])->name('mutabaah');
    Route::get('/dashboard/santri/mutabaah/months', [MutabaahController::class, 'getMonthsByYear']);

    // nilai
    Route::get('/dashboard/santri/nilai', [NilaiController::class, 'index'])->name('nilai');
});

Route::middleware(['auth', 'role:donatur'])->group(function () {
    // DASHBOARD
    Route::get('/donaturdashboard', [DonaturController::class, 'dashboard'])->name('dashboard.donatur');

    // DATA SANTRI
    Route::get('/dashboard/donatur/santri', [DonaturController::class, 'index'])->name('donatur.santri');
    Route::get('/dashboard/donatur/santri/show/{id}', [DonaturController::class, 'show'])->name('donatur.detailsantri');

    // pelanggaran
    Route::get('/dashboard/donatur/pelanggaran', [DonaturController::class, 'pelanggaran'])->name('donatur.pelanggaran');

    // prestasi
    Route::get('/dashboard/donatur/prestasi', [DonaturController::class, 'prestasi'])->name('donatur.prestasi');

    // mutabaah
    Route::get('/dashboard/donatur/mutabaah', [DonaturController::class, 'mutabaah'])->name('donatur.mutabaah');
    Route::get('/dashboard/donatur/mutabaah/detail/{id}', [DonaturController::class, 'detailmutabaah'])->name('donatur.detailmutabaah');
    Route::get('/dashboard/donatur/mutabaah/getMonths/{id}', [DonaturController::class, 'getMonths'])->name('getMonths');

    // nilai
    Route::get('/dashboard/donatur/nilai', [DonaturController::class, 'nilai'])->name('donatur.nilai');
});

require __DIR__ . '/auth.php';
