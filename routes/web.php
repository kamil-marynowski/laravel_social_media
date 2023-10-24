<?php

use App\Actions\Controllers\SendFriendInvitation;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::prefix('/friendships')->group(function () {
        Route::post('/', [FriendshipController::class, 'store'])->name('friendships.store');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
    });

    Route::prefix('/friends')->group(function () {
        Route::get('/', [FriendController::class, 'index'])->name('friends.index');
    });

    Route::prefix('/posts')->group(function () {
        Route::get ('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/',       [PostController::class, 'store' ])->name('posts.store' );
    });

    Route::middleware('role:admin')->group(function () {

        Route::prefix('/roles')->group(function () {
            Route::get ('/',       [RoleController::class, 'index' ])->name('roles.index' );
            Route::get ('/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/',       [RoleController::class, 'store' ])->name('roles.store' );
        });
    });


    Route::post('/actions/send-friend-invitation', SendFriendInvitation::class)
        ->name('actions.send_friend_invitation');
});




