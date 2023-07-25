<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\EntriController;


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
    return view('frontend.index');
});


//Entries All Route
Route::controller(EntriController::class)->group(function() {
    Route::get('/entri/page', 'EntriPage')->name('entri.page');

    Route::post('/update/entri', 'UpdateEntri')->name('update.entri');
});

Route::controller(EntriController::class)->group(function () {
    Route::get('/all/entri', 'AllEntri')->name('all.entri');

    Route::get('/add/entri', 'AddEntri')->name('add.entri');

    Route::post('/store/entri', 'StoreEntri')->name('store.entri');

    Route::get('/edit/entri/{id}', 'EditEntri')->name('edit.entri');

    Route::post('/update/entri', 'UpdateEntri')->name('update.entri');

    Route::get('/entri/download/{entri}', 'Download')->name('entri.download');
   
});


// Admin All Route
Route::controller(AdminController::class)->group(function() {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
