<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameGenreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionHeaderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\AdminAuthentication;
use App\Models\Game;
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

Route::get('/', [ViewController::class, 'initialPage']);
Route::get('/signUp', [ViewController::class, 'showSignUpPage']);
Route::get('/signIn', [ViewController::class, 'showSignInPage']);
Route::post('/signUp', [AuthorizationController::class, 'signUp']);
Route::post('/signIn', [AuthorizationController::class, 'signIn']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthorizationController::class, 'logout']);
    Route::get('/managegame', [ViewController::class, 'showManageGamePage'])->middleware('adminAuth');
    Route::get('/profile', [ViewController::class, 'viewEditProfilePage']);
    Route::patch('/profile', [UserController::class, 'updateProfile']);
    Route::post('/profile', [UserController::class, 'updatePassword'])->name('updateaccount');
    Route::get('/transactionhistory', [TransactionController::class, 'ShowTransactionHeader']);
    Route::get('/transactionhistorydetail/{id}', [TransactionController::class, 'ShowTransactionDetail']);
    Route::get('/search', [GameController::class, 'searchGame']);
});
Route::resource('game', GameController::class);
Route::resource('cart', CartController::class);
Route::resource('gamegenre', GameGenreController::class);
