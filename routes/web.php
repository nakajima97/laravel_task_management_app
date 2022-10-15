<?php

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/normal-user/tasks', [App\Http\Controllers\NormalUser\TaskController::class, 'index']);
Route::post('/normal-user/tasks/store', [App\Http\Controllers\NormalUser\TaskController::class, 'store']);
Route::get('/admin-user/tasks', [App\Http\Controllers\AdminUser\TaskController::class, 'index']);

require __DIR__ . '/auth.php';
