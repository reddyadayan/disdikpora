<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DatasdController;
use App\Http\Controllers\EditController;

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/export', [ExportController::class, 'export'])->name('dashboard.export');
    Route::post('/dashboard/import', [ExportController::class, 'import'])->name('dashboard.import');
    Route::get('/datasd', [DatasdController::class, 'index'])->name('data.datasd');
    Route::get('/datasd/export', [DatasdController::class, 'export'])->name('datasd.export');
    Route::post('/datasd/import', [DatasdController::class, 'import'])->name('datasd.import');
    Route::get('/edit/{id}', [EditController::class, 'show'])->name('edit.show');
    Route::put('/edit/{id}', [EditController::class, 'update'])->name('edit.update');
    Route::delete('/edit/{id}', [EditController::class, 'destroy'])->name('edit.destroy');
    Route::get('/datapaud', [DatasdController::class, 'index'])->name('data.datapaud');
});
