<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WeeklyOfferController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\SetLocale;

use Illuminate\Support\Facades\Route;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', fn () => view('home'))->name('home');
    Route::get('/etlap', [MenuController::class, 'index'])->name('menu');
    Route::get('/hetiaj', [WeeklyOfferController::class, 'show'])->name('weekly');
    Route::get('/admin/login', fn () => view('admin.login'))->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/elerhetoseg', fn () => view('contacts'))->name('contacts');
}
);
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/meta', [AdminController::class, 'updateMeta'])->name('admin.meta.update');
    Route::post('/admin/offer', [AdminController::class, 'addOffer'])->name('admin.offer.add');
    Route::delete('/admin/offer/{id}', [AdminController::class, 'deleteOffer'])->name('admin.offer.delete');
});
