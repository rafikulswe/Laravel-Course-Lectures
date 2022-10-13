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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('dashboard/', [App\Http\Controllers\Admin\MasterController::class, 'dashboard'])->name('dashboard');
    // USER ROUTE

    Route::group(['middleware' => 'accountFreezeCheck'], function() {
        Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('usersIndex');
        Route::get('users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('usersCreate');
        Route::post('users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('usersStore');
        Route::get('users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('usersEdit');
        Route::put('users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('usersUpdate');
        Route::delete('users/destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('usersDestroy');

        Route::resource('blogCategory', App\Http\Controllers\Admin\BlogCategoryController::class);
        Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
        Route::get('blogTrashDataList', [App\Http\Controllers\Admin\BlogController::class, 'trashDataList'])->name('blogTrashDataList');
    });


});



// +--------+----------+------------------------+------------------+------------------------------------------------------------------------+------------+
// | Domain | Method   | URI                    | Name             | Action                                                                 | Middleware |
// +--------+----------+------------------------+------------------+------------------------------------------------------------------------+------------+
// |        | GET|HEAD | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web        |
// |        |          |                        |                  |                                                                        | guest      |
// |        | POST     | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web        |
// |        |          |                        |                  |                                                                        | guest      |
// |        | POST     | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web        |
// |        | GET|HEAD | password/confirm       | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web        |
// |        |          |                        |                  |                                                                        | auth       |
// |        | POST     | password/confirm       |                  | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web        |
// |        |          |                        |                  |                                                                        | auth       |
// |        | POST     | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web        |
// |        | GET|HEAD | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web        |
// |        | POST     | password/reset         | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web        |
// |        | GET|HEAD | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web        |
// |        | GET|HEAD | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web        |
// |        |          |                        |                  |                                                                        | guest      |
// |        | POST     | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web        |
// |        |          |                        |                  |                                                                        | guest      |
// +--------+----------+------------------------+------------------+------------------------------------------------------------------------+------------+


