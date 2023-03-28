<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::group(['prefix' => 'people', 'as' => 'member.'], function () {
    Route::get('create', [PersonController::class, 'create'])
        ->name('create');
    Route::post('/', [PersonController::class, 'store'])
        ->name('store');
    Route::get('/', [PersonController::class, 'index'])
        ->name('index');
    Route::get('{person}', [PersonController::class, 'show'])
        ->name('show');
    Route::delete('{person}', [PersonController::class, 'destroy'])
        ->name('delete');
});

Auth::routes();


