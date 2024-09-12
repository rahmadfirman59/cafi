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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('login',[App\Http\Controllers\AuthController::class,'doLogin'])->name('do.login');
Route::get('logout',[App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::get('profile',[App\Http\Controllers\AuthController::class,'profil'])->name('profile');
Route::post('profile',[App\Http\Controllers\AuthController::class,'profil_update'])->name('profile.update');


Route::get('dashboards',[App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard');

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\UsersController::class,'index'])->name('users');
    Route::get('/create',[App\Http\Controllers\UsersController::class,'create'])->name('users.create');
    Route::post('/store',[App\Http\Controllers\UsersController::class,'store'])->name('users.store');
    Route::get('/edit/{id}',[App\Http\Controllers\UsersController::class,'edit'])->name('users.edit');
    Route::post('/update/{id}',[App\Http\Controllers\UsersController::class,'update'])->name('users.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\UsersController::class,'delete'])->name('users.destroy');
});

Route::group(['prefix' => 'roles', 'middleware' => ['auth']], function(){
    Route::get('/',[App\Http\Controllers\RolesController::class,'index'])->name('roles');
    Route::get('/create',[App\Http\Controllers\RolesController::class,'create'])->name('roles.create');
    Route::post('/store',[App\Http\Controllers\RolesController::class,'store'])->name('roles.store');
    Route::get('/edit/{id}',[App\Http\Controllers\RolesController::class,'edit'])->name('roles.edit');
    Route::post('/update/{id}',[App\Http\Controllers\RolesController::class,'update'])->name('roles.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\RolesController::class,'delete'])->name('roles.destroy');
});
