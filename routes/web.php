<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('app');
//});

Route::inertia('/admin-panel', 'AdminPanelPage')->middleware('admin');
Route::inertia('/sign-up', 'SignUpPage')->middleware('guest')->name('sign-up');
Route::inertia('/sign-in', 'SignInPage')->middleware('guest')->name('sign-in');
Route::inertia('/', 'HomePage')->name('home');

Route::post('login', [App\Http\Controllers\Auth\AuthenticationController::class, 'login']);
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('logout', [App\Http\Controllers\Auth\AuthenticationController::class, 'logOut']);

Route::get('check', [App\Http\Controllers\Auth\AuthenticationController::class, 'checkAuth']);

Route::get('coins', [App\Http\Controllers\CoinsController::class, 'index']);

Route::group(['middleware' => 'admin'], function() {
    Route::get('users', [App\Http\Controllers\UserController::class, 'index']);
    Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

    Route::post('coins', [App\Http\Controllers\CoinsController::class, 'update']);
});
