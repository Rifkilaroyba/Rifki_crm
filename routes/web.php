<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard (Login Required)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile Routes (Login Required)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Leads Routes (All Authenticated Users)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('leads', LeadController::class);
});

/*
|--------------------------------------------------------------------------
| Product Routes (All Authenticated Users)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});

/*
|--------------------------------------------------------------------------
| Project Routes (All Authenticated Users)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // List semua project → harus GET
    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');

    // Form tambah project dari lead → harus GET
    Route::get('projects/create/{lead}', [ProjectController::class, 'create'])->name('projects.create');

    // Simpan project baru → POST
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');

    // Approve project → POST
    Route::post('projects/{project}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
});


/*
|--------------------------------------------------------------------------
| Customer Routes (All Authenticated Users)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
