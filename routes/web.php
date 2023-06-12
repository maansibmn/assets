<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AssetController;
use \App\Http\Controllers\LoginController;

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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('admin.login');
});

Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('home', [LoginController::class, 'dashboard'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('assets', [AssetController::class, 'index'])->name('admin.assets');
    Route::get('assets/add', [AssetController::class, 'create'])->name('admin.assets.add');
    Route::post('assets', [AssetController::class, 'store'])->name('admin.assets.store');
    Route::post('update-assets', [AssetController::class, 'update'])->name('admin.assets.update');
    Route::delete('assets', [AssetController::class, 'destroy'])->name('admin.assets.delete');

    Route::get('assets/{id}', [AssetController::class, 'edit'])->name('admin.assets.edit');
    Route::put('assets', [AssetController::class, 'update'])->name('admin.assets.update');

});
