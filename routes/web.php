<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\UserPerizinanController;
use App\Http\Controllers\user\UserFolderController;
use App\Http\Controllers\user\UserFileController;
use App\Http\Controllers\user\UserHomeController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Controllers\user\UserUbahPasswordController;
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



// Route::get('/login',[LoginController::class,'index'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::get('/',[HomeController::class,'index'])->name('home');
// Route::get('/perizinan/tambah',[PerizinanController::class,'tambah'])->name('perizinan.tambah');
// Route::get('/perizinan/{jenis_usaha?}', [PerizinanController::class, 'index'])->name('perizinan');
// Route::post('/perizinan/tambah',[PerizinanController::class,'store'])->name('perizinan.store');
// Route::get('/{jenis_usaha}', [HomeController::class, 'index'])->name('home.jenis_usaha_redirect');
// Route::get('/perizinan/{id}/view',[PerizinanController::class,'view'])->name('perizinan.view');
// Route::get('/folder/tambah/{perizinan_id}', [FolderController::class, 'tambah'])->name('folder.tambah');
// Route::post('/folder/tambah', [FolderController::class, 'store'])->name('folder.store');
// Route::get('/folder/{folder_id}/file', [FileController::class, 'index'])->name('file.index');
// Route::get('/file/tambah/{folder_id}', [FileController::class, 'tambah'])->name('file.tambah');
// Route::post('/file/tambah/{folder_id}', [FileController::class, 'store'])->name('file.store');
// Route::get('/file/download/{file_id}', [FileController::class, 'download'])->name('file.download');
// Route::delete('/perizinan/{perizinan_id}', [PerizinanController::class,'destroy'])->name('perizinan.destroy');
// Route::delete('/folder/{folder_id}', [FolderController::class, 'destroy'])->name('folder.destroy');
// Route::delete('/file/destroy/{file_id}', [FileController::class, 'destroy'])->name('file.destroy');
// Route::delete('/perizinan/hapus/{perizinan_id}', [PerizinanController::class, 'hapus'])->name('perizinan.hapus');
// Route::get('/perizinan/edit/{perizinan_id}', [PerizinanController::class, 'edit'])->name('perizinan.edit');
// Route::put('/perizinan/update/{perizinan_id}', [PerizinanController::class, 'update'])->name('perizinan.update');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/user/home',[UserHomeController::class,'index'])->name('user.home');
// Route::get('/user/perizinan/{jenis_usaha?}', [UserPerizinanController::class, 'index'])->name('user.perizinan');
// Route::get('/user/perizinan/{id}/view',[UserPerizinanController::class,'view'])->name('user.perizinan.view');
// Route::get('/user/folder/{folder_id}/file', [UserFileController::class, 'index'])->name('user.file.index');
// Route::get('/user/file/download/{file_id}', [UserFileController::class, 'download'])->name('user.file.download');


Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [UbahPasswordController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [UbahPasswordController::class, 'updateProfile']);
    Route::get('/user/profile', [UserUbahPasswordController::class, 'showProfile'])->name('user.profile');
    Route::post('/user/profile', [UserUbahPasswordController::class, 'updateProfile'])->name('user.change');
    
});

// Rute untuk admin
    Route::middleware(['web', 'admin.check'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/perizinan/tambah',[PerizinanController::class,'tambah'])->name('perizinan.tambah');
    Route::get('/perizinan/{jenis_usaha?}', [PerizinanController::class, 'index'])->name('perizinan');
    Route::post('/perizinan/tambah',[PerizinanController::class,'store'])->name('perizinan.store');
    Route::get('/{jenis_usaha}', [HomeController::class, 'index'])->name('home.jenis_usaha_redirect');
    Route::get('/perizinan/{id}/view',[PerizinanController::class,'view'])->name('perizinan.view');
    Route::get('/folder/tambah/{perizinan_id}', [FolderController::class, 'tambah'])->name('folder.tambah');
    Route::post('/folder/tambah', [FolderController::class, 'store'])->name('folder.store');
    Route::get('/folder/{folder_id}/file', [FileController::class, 'index'])->name('file.index');
    Route::get('/file/tambah/{folder_id}', [FileController::class, 'tambah'])->name('file.tambah');
    Route::post('/file/tambah/{folder_id}', [FileController::class, 'store'])->name('file.store');
    Route::get('/file/download/{file_id}', [FileController::class, 'download'])->name('file.download');
    Route::delete('/perizinan/{perizinan_id}', [PerizinanController::class,'destroy'])->name('perizinan.destroy');
    Route::delete('/folder/{folder_id}', [FolderController::class, 'destroy'])->name('folder.destroy');
    Route::delete('/file/destroy/{file_id}', [FileController::class, 'destroy'])->name('file.destroy');
    Route::delete('/perizinan/hapus/{perizinan_id}', [PerizinanController::class, 'hapus'])->name('perizinan.hapus');
    Route::get('/perizinan/edit/{perizinan_id}', [PerizinanController::class, 'edit'])->name('perizinan.edit');
    Route::put('/perizinan/update/{perizinan_id}', [PerizinanController::class, 'update'])->name('perizinan.update');
    Route::get('/profile', [UbahPasswordController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [UbahPasswordController::class, 'updateProfile']);
    

    // ... (Tambahkan rute-rute admin lainnya di sini)
});

Route::middleware(['web', 'user.check'])->group(function () {
    Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');
    Route::get('/user/perizinan/{jenis_usaha?}', [UserPerizinanController::class, 'index'])->name('user.perizinan');
    Route::get('/user/perizinan/{id}/view',[UserPerizinanController::class,'view'])->name('user.perizinan.view');
    Route::get('/user/folder/{folder_id}/file', [UserFileController::class, 'index'])->name('user.file.index');
    Route::get('/user/file/download/{file_id}', [UserFileController::class, 'download'])->name('user.file.download');
    // ... (Tambahkan rute-rute pengguna lainnya di sini)
});





function getJenisUsahaLabel($jenisUsaha) {
    switch ($jenisUsaha) {
        case 'PN_IUP':
            return 'Peningkatan IUP';
        case 'PL_RUTIN':
            return 'Pelaporan Rutin';
        case 'PJ_IUP':
            return 'Perpanjangan IUP';
        default:
            return $jenisUsaha;
    }
}