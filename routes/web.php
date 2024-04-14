<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ChatController;
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

Route::middleware(['guest'])->group(function(){
    Route::get('/', function () {
        return view('auth.login');
    })->name("login_show");

    Route::post("/login",[AuthController::class, 'login'])->name('login');
    
    Route::get('/register', function () {
        return view('auth.register');
    })->name("register_show");

    Route::post("/register",[AuthController::class, 'register'])->name('register');
});

Route::get("/play",function(){
    event(new \App\Events\playgroundEvent());
    return null;
});

/* Route::get("/plad",function(){
    event(new \App\Events\Sent());
    return null;
});
 */
Route::middleware(['auth'])->group(function(){
Route::get("/chat/{id}",[ChatController::class, 'room'])->name("room");




Route::post("/chat-message", [ChatController::class, 'chat']);


Route::get('/friends',[FriendsController::class, 'friend'])->name('friend-list');

Route::post("/logout",[AuthController::class, 'logout'])->name('logout');

Route::post("/searchresult",[FriendsController::class,"search"]);

Route::post("/Res",[FriendsController::class,"Res"]);
Route::post("/cancel",[FriendsController::class,"cancel"]);
Route::post("/accept",[FriendsController::class,"accept"]);

Route::post("/read",[ChatController::class, 'read']);

});

