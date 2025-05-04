<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [Controller::class, 'welcome']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('lines', LineController::class);
    Route::resource('tickets', TicketController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
