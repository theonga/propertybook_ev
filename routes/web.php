<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\PricingController;
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

Route::get('/', [SectionController::class, 'index'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [SectionController::class, 'admin'])->name('admin');
    Route::get('/admin/add', [SectionController::class, 'add'])->name('sections.add');
    Route::get('/admin/create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('/admin', [SectionController::class, 'store'])->name('sections.store');
    Route::get('/admin/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');
    Route::put('/admin/{id}', [SectionController::class, 'update'])->name('sections.update');
    Route::delete('/admin/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');
    Route::get('/admin/pricings', [PricingController::class, 'index'])->name('pricings.index');
    Route::get('//admin/pricings/create', [PricingController::class, 'create'])->name('pricings.create');
    Route::post('/admin/pricings', [PricingController::class, 'store'])->name('pricings.store');
    Route::get('/admin/pricings/{id}/edit', [PricingController::class, 'edit'])->name('pricings.edit');
    Route::put('/admin/pricings/{id}', [PricingController::class, 'update'])->name('pricings.update');
    Route::delete('/admin/pricings/{id}', [PricingController::class, 'destroy'])->name('pricings.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
