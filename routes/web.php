<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\MovieController as UserMovieController;
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


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('authenticate');
Route::get('registration', [AuthController::class, 'registerForm'])->name('register-form');
Route::post('registration', [AuthController::class, 'userRegistration'])->name('register.user');

Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
    Route::post('signout', [AuthController::class, 'signOut'])->name('user.signout');

    Route::prefix('admin/')->as('admin.')->group(function () {

        Route::get('/dashboard', HomeController::class);
        Route::controller(MovieController::class)->prefix('movies')->as('movies.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('delete');
        });
        Route::get('users', [UserController::class, 'index'])->name('users.index');
    });
    // user favorite movie route
    Route::post('add-favorite', [UserMovieController::class, 'addFavorite'])->name('add-favorite');
    Route::get('my-favorite', [UserMovieController::class, 'myFavorite'])->name('my-favorite');
});

Route::get('/', [UserMovieController::class, 'landingpage'])->name('landingpage');
