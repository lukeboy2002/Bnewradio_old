<?php

use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikeController;
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

//NEWSLETTER
Route::post('newsletter', NewsletterController::class)->name('newsletter');

//BLOG
Route::get('posts', [PostController::class, 'index'])->name('posts');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth', 'verified'])->group(function () {
    //SHOW PROFILE (Currentuser)
    Route::get('profiles/{user:username}', [ProfileController::class, 'show'])->name('profiles');
    //EXPLORE USERS
    Route::get('explore', [ExploreController::class, 'index'])->name('explore');
    Route::get('explore/{user:username}', [ExploreController::class, 'show'])->name('explore.show');
    //FOLLOW USER
    Route::post('profiles/{user:username}/follow', [FollowController::class, 'store']);

    //BTWEET
    Route::get('tweets', [TweetController::class, 'index'])->name('tweet');
    Route::post('tweets', [TweetController::class, 'store']);

    //BTWEET LIKE/DISLIKE
    Route::post('/tweets/{tweet}/like', [TweetLikeController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikeController::class, 'destroy']);

/*    //BLOG COMMENT
    Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);*/

});

//CAN EDIT USER
Route::middleware(['auth', 'verified', 'can:edit,user'])->group(function () {
//PROFILE
    Route::get('profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profiles/{user:username}', [ProfileController::class, 'update']);
});

//ADMIN ROUTES
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function (){
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
//    Route::resource('/posts', PostController::class);
    Route::resource('/permissions',PermissionController::class);
});
