<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin')->group(function(){
    Route::get('users',[UsersController::class,'index'])->name('.users.index');
    Route::get('edit/',[UsersController::class,'edit'])->name('.edit.index');
    Route::get('delete/',[UsersController::class,'delete'])->name('.delete.index');
    Route::get('update/',[UsersController::class,'update'])->name('.update.index');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
