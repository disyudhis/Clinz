<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/view_status', [ClientController::class, 'view_status']);
Route::get('/view_dashboard', [ClientController::class, 'view_dashboard']);
Route::get('/view_order', [ClientController::class, 'view_order']);
Route::get('/view_history', [ClientController::class, 'view_history']);
Route::get('/view_settings', [ClientController::class, 'view_settings']);

// admin
Route::get('/', [AdminController::class, 'index']);
Route::get('/update_order', [AdminController::class, 'update_order']);
Route::get('/delete_order', [AdminController::class, 'delete_order']);
Route::get('/update_user', [AdminController::class, 'update_user']);
Route::get('/delete_user', [AdminController::class, 'delete_user']);
// Route::get('/', [])

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/redirect', [HomeController::class, 'redirect']);
require __DIR__ . '/auth.php';