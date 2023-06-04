<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;

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


Route::get('/register', [LoginRegisterController::class, 'register'])
    ->name('register')
    ->withoutMiddleware([AdminMiddleware::class]);

Route::post('/store', [LoginRegisterController::class, 'store'])
    ->name('store')
    ->withoutMiddleware([AdminMiddleware::class]);

Route::get('/login', [LoginRegisterController::class, 'login'])
    ->name('login')
    ->withoutMiddleware([AdminMiddleware::class]);

Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])
    ->name('authenticate')
    ->withoutMiddleware([AdminMiddleware::class]);

Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])
    ->name('dashboard')
    ->withoutMiddleware([AdminMiddleware::class]);

Route::get('/user-option', [LoginRegisterController::class, 'user_option'])
    ->name('user.option')
    ->withoutMiddleware([AdminMiddleware::class]);




Route::post('/logout', [LoginRegisterController::class, 'logout'])
    ->name('logout')
    ->withoutMiddleware([AdminMiddleware::class]);


// change password route
// routes/web.php


Route::get('/change-password', [ChangePasswordController::class, 'showForm'])
    ->name('password.change')
    ->withoutMiddleware([AdminMiddleware::class])
    ->middleware('auth');

Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])
    ->name('password.update')
    ->withoutMiddleware([AdminMiddleware::class])
    ->middleware('auth');
// route artikel

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index')->middleware('auth')->withoutMiddleware([AdminMiddleware::class]);
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth')->withoutMiddleware([AdminMiddleware::class]);
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store')->middleware('auth')->withoutMiddleware([AdminMiddleware::class]);
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show')->middleware('auth')->withoutMiddleware([AdminMiddleware::class]);
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('auth')->withoutMiddleware([AdminMiddleware::class]);
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('auth')->withoutMiddleware([AdminMiddleware::class]);
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('auth')->withoutMiddleware([AdminMiddleware::class]);




Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'login'])
    ->name('admin.login')
    ->middleware('admin');

    Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])
    ->name('admin.authenticate')
    ->middleware('admin');

    Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('admin');

    Route::post('/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('admin');



    // Tambahkan rute admin lainnya di sini
});
Route::prefix('admin')->name('admin.')->group(function () {
    // Rute-rute admin lainnya

    Route::get('/users', 'UserController@index')
        ->name('admin.users.index')
        ->middleware(['admin', 'auth']);

    Route::get('/users/{user}', 'UserController@edit')
        ->name('admin.users.edit')
        ->middleware(['admin', 'auth']);

    Route::put('/users/{user}', 'UserController@update')
        ->name('admin.users.update')
        ->middleware(['admin', 'auth']);
});



