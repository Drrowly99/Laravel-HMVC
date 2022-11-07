<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Signin\Http\Controllers\SigninController;
use Modules\Signup\Http\Controllers\SignupController;

Route::prefix('signin')->group(function() {
    Route::get('/', 'SigninController@index');
    Route::post('/submit', 'SigninController@submit');
    Route::get('/dashboard', 'SigninController@dashboard')->name('dashboard');
});
