<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::get('/interactions', [InteractionController::class, 'index'])->name('interactions.index');
Route::get('/interactions/create', [InteractionController::class, 'create'])->name('interactions.create');
Route::post('/interactions', [InteractionController::class, 'store'])->name('interactions.store');

Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::resource('contacts', ContactController::class);
Route::resource('interactions', InteractionController::class);
Route::resource('sales', SaleController::class);
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');