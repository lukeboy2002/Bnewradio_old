<?php

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

//LOGIN REQUIRED
Route::middleware(['auth', 'verified'])->group(function () {
    //CURRENT USER PROFILE
    Route::get('profiles/{user:username}', [ProfileController::class, 'show'])->name('profiles');
    Route::get('profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});
