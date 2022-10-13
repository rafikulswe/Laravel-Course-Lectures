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
    return redirect()->route('login');
});

Route::get('login', [App\Http\Controllers\MasterController::class, 'getLogin'])->name('login');
Route::post('login', [App\Http\Controllers\MasterController::class, 'loginAction'])->name('login');
Route::post('logout', [App\Http\Controllers\MasterController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\MasterController::class, 'getRegister'])->name('register');
Route::post('register', [App\Http\Controllers\MasterController::class, 'registerAction'])->name('register');

Route::get('registerVerify', [App\Http\Controllers\MasterController::class, 'registerVerify'])->name('registerVerify');
Route::post('registerVerify', [App\Http\Controllers\MasterController::class, 'registerVerifyAction'])->name('registerVerify');

Route::group(['middleware' => 'auth'], function() {
    Route::get('home', [App\Http\Controllers\MasterController::class, 'home'])->name('home');
});

