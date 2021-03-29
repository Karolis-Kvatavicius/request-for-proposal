<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [MaterialController::class, 'userIndex'])->middleware(['auth'])->name('dashboard');
Route::post('/store/{material}', [RequestController::class, 'store'])->middleware(['auth'])->name('store.request');

Route::get('/admin-dashboard', [MaterialController::class, 'index'])->middleware(['admin'])->name('admin.dashboard');
Route::post('/admin-dashboard', [MaterialController::class, 'store'])->middleware(['admin']);

Route::post('/dashboard/filter', [MaterialController::class, 'filter'])->middleware(['auth'])->name('materials.filter');

Route::get('/admin-dashboard/requests', [RequestController::class, 'index'])->middleware(['admin'])->name('admin.requests');
Route::post('/admin-dashboard/requests/{req}', [RequestController::class, 'update'])->middleware(['admin'])->name('admin.request.update');

require __DIR__ . '/auth.php';
