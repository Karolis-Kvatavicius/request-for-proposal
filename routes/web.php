<?php

use App\Http\Controllers\HardcopyController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RandUserApiController;
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

Route::get('/', [RandUserApiController::class, 'index'])->name('welcome');

Route::get('/dashboard', [MaterialController::class, 'userIndex'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard', [MaterialController::class, 'filter'])->middleware(['auth']);

Route::post('/store/{material}', [RequestController::class, 'store'])->middleware(['auth'])->name('store.request');

Route::get('/admin-dashboard', [MaterialController::class, 'index'])->middleware(['admin'])->name('admin.dashboard');
Route::post('/admin-dashboard', [MaterialController::class, 'filter'])->middleware(['admin']);
Route::put('/admin-dashboard', [MaterialController::class, 'store'])->middleware(['admin']);

Route::get('/admin-dashboard/requests', [RequestController::class, 'index'])->middleware(['admin'])->name('admin.requests');
Route::post('/admin-dashboard/requests/{req}', [RequestController::class, 'update'])->middleware(['admin'])->name('admin.request.update');
Route::put('/admin-dashboard/hardcopy/{req}', [HardcopyController::class, 'store'])->middleware(['admin'])->name('hardcopy.taken');

Route::get('admin-dashboard/hardcopies', [HardcopyController::class, 'index'])->middleware(['admin'])->name('hardcopies.taken');
Route::post('admin-dashboard/hardcopies/{hardcopy}', [HardcopyController::class, 'return'])->middleware(['admin'])->name('hardcopy.return');

require __DIR__ . '/auth.php';
