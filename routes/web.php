<?php

use App\Models\Dtr;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DTRController;
use App\Http\Controllers\UserController;

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
    $dtr = [];

    if (auth()->check()) {
        $user = User::find(auth()->id());
        $dtr = $user->times()->latest()->get();
    }

    return view('home', ['dtrs' => $dtr]);
});

Route::post ('/register', [UserController::class, 'register']);
Route::post ('/logout', [UserController::class, 'logout']);
Route::post ('/login', [UserController::class, 'login']);

//DTR Routes
Route::post ('/create-dtr',[DTRController::class, 'createDtr']);
Route::get ('/edit/{dtr}',[DTRController::class,'edit']);
Route::put ('/edit/{dtr}',[DTRController::class,'updateDtr']);
Route::delete ('/delete/{dtr}',[DTRController::class,'deleteDtr']);