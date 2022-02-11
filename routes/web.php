<?php

use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\ProfileController;
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
})->name('home');

//SOCIALITE
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::middleware(['auth', 'verified'])->group(function () {
    //CURRENT USER PROFILE
    Route::get('profiles/{user:username}', [ProfileController::class, 'show'])->name('profiles');
    Route::get('profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

//ADMIN ROUTES
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function (){
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
//    Route::resource('/posts', PostController::class);
    Route::resource('/permissions',PermissionController::class);
});
