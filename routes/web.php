<?php


use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HistoryOfficerController;
use App\Http\Controllers\HistoryStudentController;
use App\Http\Controllers\PaymentOfficerController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin route
Route::get('/spp', [SPPController::class, 'index'])->middleware('auth');
Route::get('/spp/create', [SPPController::class, 'create'])->middleware('auth');
Route::post('/spp/create/store', [SPPController::class, 'store'])->middleware('auth');
Route::get('/spp/edit/{id}', [SPPController::class, 'edit'])->middleware('auth');
Route::put('/spp/edit/update/{id}', [SPPController::class, 'update'])->middleware('auth');
Route::delete('/spp/delete/{id}', [SPPController::class, 'delete'])->middleware('auth');

Route::get('/rombel', [RombelController::class, 'index'])->middleware('auth');
Route::get('/rombel/create', [RombelController::class, 'create'])->middleware('auth');
Route::post('/rombel/create/store', [RombelController::class, 'store'])->middleware('auth');
Route::get('/rombel/edit/{id}', [RombelController::class, 'edit'])->middleware('auth');
Route::put('/rombel/edit/update/{id}', [RombelController::class, 'update'])->middleware('auth');
Route::delete('/rombel/delete/{id}', [RombelController::class, 'delete'])->middleware('auth');

Route::get('/siswa', [StudentController::class, 'index'])->middleware('auth');
Route::get('/siswa/create', [StudentController::class, 'create'])->middleware('auth');
Route::post('/siswa/create/store', [StudentController::class, 'store'])->middleware('auth');
Route::get('/siswa/edit/{kode}', [StudentController::class, 'edit'])->middleware('auth');
Route::put('/siswa/edit/update/{kode}', [StudentController::class, 'update'])->middleware('auth');
Route::delete('/siswa/delete/{kode}', [StudentController::class, 'delete'])->middleware('auth');

Route::get('/petugas', [OfficerController::class, 'index'])->middleware('auth');
Route::get('/petugas/create', [OfficerController::class, 'create'])->middleware('auth');
Route::post('/petugas/create/store', [OfficerController::class, 'store'])->middleware('auth');
Route::get('/petugas/edit/{kode}', [OfficerController::class, 'edit'])->middleware('auth');
Route::put('/petugas/edit/update/{kode}', [OfficerController::class, 'update'])->middleware('auth');
Route::delete('/petugas/delete/{kode}', [OfficerController::class, 'delete'])->middleware('auth');

Route::get('/pembayaran', [PaymentController::class, 'index'])->middleware('auth');
Route::get('/pembayaran/create', [PaymentController::class, 'create'])->middleware('auth');
Route::post('/pembayaran/create/store', [PaymentController::class, 'store'])->middleware('auth');
Route::get('/pembayaran/edit/{id}', [PaymentController::class, 'edit'])->middleware('auth');
Route::put('/pembayaran/edit/update/{id}', [PaymentController::class, 'update'])->middleware('auth');
Route::delete('/pembayaran/delete/{id}', [PaymentController::class, 'delete'])->middleware('auth');
Route::get('/pembayaran/show/{id}', [PaymentController::class, 'show'])->middleware('auth');
Route::get('/pembayaran/getdata/{nisn}', [PaymentController::class, 'getData'])->middleware('auth');

Route::get('/history', [HistoryController::class, 'index'])->middleware('auth');
Route::get('/history/export', [HistoryController::class, 'export'])->middleware('auth');


// siswa route
Route::get('/historySiswa', [HistoryStudentController::class, 'index'])->middleware('auth');

// petugas route
Route::get('/pembayaranPetugas', [PaymentOfficerController::class, 'index'])->middleware('auth');
Route::get('/pembayaranPetugas/create', [PaymentOfficerController::class, 'create'])->middleware('auth');
Route::post('/pembayaranPetugas/create/store', [PaymentOfficerController::class, 'store'])->middleware('auth');
Route::get('/pembayaranPetugas/edit/{id}', [PaymentOfficerController::class, 'edit'])->middleware('auth');
Route::put('/pembayaranPetugas/edit/update/{id}', [PaymentOfficerController::class, 'update'])->middleware('auth');
Route::delete('/pembayaranPetugas/delete/{id}', [PaymentOfficerController::class, 'delete'])->middleware('auth');
Route::get('/pembayaranPetugas/show/{id}', [PaymentOfficerController::class, 'show'])->middleware('auth');
Route::get('/get-data/{nisn}', [PaymentOfficerController::class, 'getData'])->middleware('auth');

Route::get('/historyPetugas', [HistoryOfficerController::class, 'index'])->middleware('auth');
Route::get('/historyPetugas/export', [HistoryOfficerController::class, 'export'])->middleware('auth');