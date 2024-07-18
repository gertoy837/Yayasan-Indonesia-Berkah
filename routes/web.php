<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Santri\SantriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Santri\PelanggaranController;
use App\Http\Controllers\Santri\DashboardController;
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
use Illuminate\Support\Facades\Storage;

// Auth Controller
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;

// Setting Controller
use App\Http\Controllers\SettingsController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
// Route::get('/santri', [SantriController::class, 'index'])->middleware('santri');
// Route::get('/donatur', [DonaturController::class, 'index'])->middleware('donatur');
// });

Route::middleware(['auth', 'admin'])->group(function () {

    //chart
    Route::get('/get-dates-by-month/{month}', [SantriController::class, 'getDatesByMonth'])->name('get-dates-by-month');

    
    // profile
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DASHBOARD
    Route::get('/admindashboard', [AdminController::class, 'dashboard'])->name('admindashboard');

    // search
    Route::get('/adminsantris/search', [AdminController::class, 'search'])->name('search');

    // DATA SANTRI
    Route::get('/adminsantri',[AdminController::class, 'index'])->name('adminsantri');
    Route::get('/adminsantriaddsantri',[AdminController::class, 'create'])->name('admintambahsantri');
    Route::post('/adminsantristore',[AdminController::class, 'store'])->name('adminstoretambah');
    Route::get('/adminsantriformeditsantri/{id}',[AdminController::class, 'edit'])->name('admineditsantri'); 
    Route::put('/adminsantri/updatesantri/{id}',[AdminController::class, 'update'])->name('adminupdatesantri');
    Route::get('/adminsantri/show/{id}',[AdminController::class, 'show'])->name('admindetailsantri');
    Route::get('/adminsantri/hapussantri/{id}',[AdminController::class, 'destroy'])->name('adminhapussantri');

    // pelanggaran
    Route::get('/adminpelanggaran',[AdminPelanggaranController::class, 'index'])->name('adminpelanggaran');
    Route::get('/adminpelanggaran/addpelanggaran', [PelanggaranController::class, 'create'])->name('admintambahpelanggaran');
    Route::post('/adminpelanggaran/store',[AdminPelanggaranController::class, 'store'])->name('adminstorepelanggaran');
    Route::get('/adminpelanggaran/formeditpelanggaran/{id}',[AdminPelanggaranController::class, 'edit'])->name('admineditpelanggaran'); 
    Route::put('/adminpelanggaran/updatepelanggaran/{id}',[AdminPelanggaranController::class, 'update'])->name('adminupdatepelanggaran');
    Route::get('/adminpelanggaran/show/{id}',[AdminPelanggaranController::class, 'show'])->name('admindetailpelanggaran');
    Route::get('/adminpelanggaran/hapuspelanggaran/{id}',[AdminPelanggaranController::class, 'destroy'])->name('adminhapuspelanggaran');

    // prestasi
    Route::get('/adminprestasi',[AdminPrestasiController::class, 'index'])->name('adminprestasi');
    Route::get('/adminprestasi/addprestasi', [PrestasiController::class, 'create'])->name('admintambahprestasi');
    Route::post('/adminprestasi/store',[AdminPrestasiController::class, 'store'])->name('adminstoreprestasi');
    Route::get('/adminprestasi/formeditprestasi/{id}',[AdminPrestasiController::class, 'edit'])->name('admineditprestasi'); 
    Route::put('/adminprestasi/updateprestasi/{id}',[AdminPrestasiController::class, 'update'])->name('adminupdateprestasi');
    Route::get('/adminprestasi/show/{id}',[AdminPrestasiController::class, 'show'])->name('admindetailprestasi');
    Route::get('/adminprestasi/hapusprestasi/{id}',[AdminPrestasiController::class, 'destroy'])->name('adminhapusprestasi');

    // nilai
    Route::get('/adminnilai',[AdminNilaiController::class, 'index'])->name('adminnilai');
    Route::get('/adminnilai/addnilai', [NilaiController::class, 'create'])->name('admintambahnilai');
    Route::get('/adminnilai/formeditnilai/{id}',[AdminNilaiController::class, 'edit'])->name('admineditnilai'); 
    Route::put('/adminnilai/updatenilai/{id}',[AdminNilaiController::class, 'update'])->name('adminupdatenilai');
    Route::get('/adminnilai/hapusnilai/{id}',[AdminNilaiController::class, 'destroy'])->name('adminhapusnilai');
    Route::post('/adminnilai/nilai',[AdminNilaiController::class, 'store'])->name('adminstorenilai');

    // mutabaah
    Route::get('/adminmutabaah',[AdminMutabaahController::class, 'index'])->name('adminmutabaah');

    // tahajud
    Route::get('/adminmutabaah/addmutabaahtahajud', [MutabaahController::class, 'create2'])->name('admintambahmutabaahtahajud');
    Route::get('/adminmutabaah/formeditmutabaahtahajud/{id}',[AdminMutabaahController::class, 'edit'])->name('admineditmutabaahtahajud'); 
    Route::put('/adminmutabaah/updatemutabaahtahajud/{id}',[AdminMutabaahController::class, 'update'])->name('adminupdatemutabaahtahajud');
    Route::get('/adminmutabaah/hapusmutabaahtahajud/{id}',[AdminMutabaahController::class, 'destroy'])->name('adminhapusmutabaahtahajud');
    Route::post('/adminmutabaah/mutabaahtahajud',[AdminMutabaahController::class, 'store'])->name('adminstoremutabaahtahajud');

    // shalat jamaah
    Route::get('/adminmutabaah/addmutabaahdzikir', [MutabaahController::class, 'create'])->name('admintambahmutabaahdzikir');
    Route::get('/adminmutabaah/addmutabaahsholat_jamaah', [MutabaahController::class, 'create'])->name('admintambahmutabaahsholat_jamaah');
    Route::get('/adminmutabaah/addmutabaahWO', [MutabaahController::class, 'create'])->name('admintambahmutabaahWO');
    Route::get('/adminmutabaah/formeditmutabaah/{id}',[AdminMutabaahController::class, 'edit'])->name('admineditmutabaah'); 
    Route::put('/adminmutabaah/updatemutabaah/{id}',[AdminMutabaahController::class, 'update'])->name('adminupdatemutabaah');
    Route::get('/adminmutabaah/show/{id}',[AdminMutabaahController::class, 'show'])->name('admindetailmutabaah');
    Route::get('/adminmutabaah/hapusmutabaah/{id}',[AdminMutabaahController::class, 'destroy'])->name('adminhapusmutabaah');
    
    
});

    Route::middleware(['auth', 'santri'])->group(function () {

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

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // setting
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    // DASHBOARD
    Route::get('/dashboard', [SantriController::class, 'dashboard'])->name('santridashboard');

    // search
    Route::get('/search', [SantriController::class, 'search'])->name('santri.search');

    // DATA SANTRI
    Route::get('/santri',[SantriController::class, 'index'])->name('santri');
    Route::get('/santri/addsantri',[SantriController::class, 'create'])->name('tambahsantri');
    Route::post('/santri/store',[SantriController::class, 'store'])->name('storetambah');
    Route::get('/santri/formeditsantri/{id}',[SantriController::class, 'edit'])->name('editsantri'); 
    Route::put('/santri/updatesantri/{id}',[SantriController::class, 'update'])->name('updatesantri');
    Route::get('/santri/show/{id}',[SantriController::class, 'show'])->name('detailsantri');
    Route::get('/santri/hapussantri/{id}',[SantriController::class, 'destroy'])->name('hapussantri');

    // pelanggaran
    Route::get('/pelanggaran',[PelanggaranController::class, 'index'])->name('pelanggaran');
    Route::get('/pelanggaran/addpelanggaran', [PelanggaranController::class, 'create'])->name('tambahpelanggaran');
    Route::post('/pelanggaran/store',[PelanggaranController::class, 'store'])->name('storepelanggaran');
    Route::get('/pelanggaran/formeditpelanggaran/{id}',[PelanggaranController::class, 'edit'])->name('editpelanggaran'); 
    Route::put('/pelanggaran/updatepelanggaran/{id}',[PelanggaranController::class, 'update'])->name('updatepelanggaran');
    Route::get('/pelanggaran/show/{id}',[PelanggaranController::class, 'show'])->name('detailpelanggaran');
    Route::get('/pelanggaran/hapuspelanggaran/{id}',[PelanggaranController::class, 'destroy'])->name('hapuspelanggaran');

    // prestasi
    Route::get('/prestasi',[PrestasiController::class, 'index'])->name('prestasi');
    Route::get('/prestasi/addprestasi', [PrestasiController::class, 'create'])->name('tambahprestasi');
    Route::post('/prestasi/store',[PrestasiController::class, 'store'])->name('storeprestasi');
    Route::get('/prestasi/formeditprestasi/{id}',[PrestasiController::class, 'edit'])->name('editprestasi'); 
    Route::put('/prestasi/updateprestasi/{id}',[PrestasiController::class, 'update'])->name('updateprestasi');
    Route::get('/prestasi/show/{id}',[PrestasiController::class, 'show'])->name('detailprestasi');
    Route::get('/prestasi/hapusprestasi/{id}',[PrestasiController::class, 'destroy'])->name('hapusprestasi');

    // mutabaah
    Route::get('/mutabaah',[MutabaahController::class, 'index'])->name('mutabaah');
    Route::get('/mutabaah/addMutabaah',[MutabaahController::class, 'create'])->name('tambahMutabaah');

    // nilai
    Route::get('/nilai',[NilaiController::class, 'index'])->name('nilai');
    Route::get('/nilai/addnilai', [NilaiController::class, 'create'])->name('tambahnilai');
    Route::get('/nilai/formeditnilai/{id}',[NilaiController::class, 'edit'])->name('editnilai'); 
    Route::put('/nilai/updatenilai/{id}',[NilaiController::class, 'update'])->name('updatenilai');
    Route::get('/nilai/hapusnilai/{id}',[NilaiController::class, 'destroy'])->name('hapusnilai');
    Route::post('/nilai/nilai',[NilaiController::class, 'store'])->name('storenilai');

    // tahajud
    Route::get('/mutabaah/addmutabaahtahajud', [MutabaahController::class, 'create2'])->name('tambahmutabaahtahajud');
    // Route::get('/mutabaah/addmutabaah', [MutabaahController::class, 'create'])->name('tambahmutabaah');
    Route::get('/mutabaah/formeditmutabaahtahajud/{id}',[MutabaahController::class, 'edit'])->name('editmutabaahtahajud'); 
    Route::put('/mutabaah/updatemutabaahtahajud/{id}',[MutabaahController::class, 'update'])->name('updatemutabaahtahajud');
    Route::get('/mutabaah/hapusmutabaahtahajud/{id}',[MutabaahController::class, 'destroy'])->name('hapusmutabaahtahajud');
    Route::post('/mutabaah/mutabaahtahajud',[MutabaahController::class, 'store'])->name('storemutabaahtahajud');

    // shalat jamaah
    Route::get('/mutabaah/addmutabaahdzikir', [MutabaahController::class, 'create'])->name('tambahmutabaahdzikir');
    Route::get('/mutabaah/addmutabaahsholat_jamaah', [MutabaahController::class, 'create'])->name('tambahmutabaahsholat_jamaah');
    Route::get('/mutabaah/addmutabaahWO', [MutabaahController::class, 'create'])->name('tambahmutabaahWO');
    Route::get('/mutabaah/formeditmutabaah/{id}',[MutabaahController::class, 'edit'])->name('editmutabaah'); 
    Route::put('/mutabaah/updatemutabaah/{id}',[MutabaahController::class, 'update'])->name('updatemutabaah');
    Route::get('/mutabaah/show/{id}',[MutabaahController::class, 'show'])->name('detailmutabaah');
    Route::get('/mutabaah/hapusmutabaah/{id}',[MutabaahController::class, 'destroy'])->name('hapusmutabaah');
});

Route::middleware(['auth', 'donatur'])->group(function () {
    Route::get('/donatur', [DonaturController::class, 'index'])->name('donaturdashboard');
});

require __DIR__.'/auth.php';
