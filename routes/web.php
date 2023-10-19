<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\BannerSectionController;
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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//////////// ADMIN ALL ROUTES /////////////
Route::controller(AdminC::class)->group(function(){
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('admin/profile/edit/{id}', 'profileEdit')->name('admin.profile.edit');
    Route::post('admin/profile/store', 'profileStore')->name('admin.profile.store');
    Route::get('admin/change/password', 'changePassword')->name('admin.change.password');
    Route::post('admin/update/password', 'updatePassword')->name('admin.update.password');
});

//////////// BANNER SECTION ALL ROUTES /////////////
Route::controller(BannerSectionController::class)->group(function(){
    Route::get('banner/content', 'banerSection')->name('banner.content');
    Route::post('banner/update', 'banerUpdate')->name('banner.section.update');
});

require __DIR__.'/auth.php';
