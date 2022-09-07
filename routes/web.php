<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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

Route::get('home/test/', [HomeController::class, 'test']);

Route::prefix('tai-khoan')->name('users.')->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/them-moi', [UsersController::class, 'add'])->name('add');
    Route::post('/them-moi', [UsersController::class, 'postAdd'])->name('postAdd');
    Route::get('/cap-nhat/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::post('/cap-nhat/{id}', [UsersController::class, 'postEdit'])->name('postEdit');
});