<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ReportController;

Route::get('/', [ReportController::class, 'dashboard'])->name('dashboard');

Route::resource('products', ProductController::class)->except(['show']);

Route::get('stock/in', [StockController::class, 'inForm'])->name('stock.in');
Route::post('stock/in', [StockController::class, 'storeIn'])->name('stock.in.store');

Route::get('stock/out', [StockController::class, 'outForm'])->name('stock.out');
Route::post('stock/out', [StockController::class, 'storeOut'])->name('stock.out.store');

Route::get('reports/history', [ReportController::class, 'stockHistory'])->name('reports.history');
Route::get('/reports/pdf', [ReportController::class, 'generatePDF'])->name('reports.pdf');
