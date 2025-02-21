<?php

use App\Models\Dtr;
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
    $dtrs = [];
    if (auth()->check()){
        $dtrs =auth()->user()->usersTimes()->latest()->get();
    }
    
    // $dtrs = Dtr::where('user_id', auth()->id())->get();
    return view('home',['dtrs' => $dtrs]);
});

Route::post ('/register', [UserController::class, 'register']);
Route::post ('/logout', [UserController::class, 'logout']);
Route::post ('/login', [UserController::class, 'login']);

//DTR Routes
Route::post ('/create-dtr',[DTRController::class, 'createDtr']);
Route::get ('/edit/{dtr}',[DTRController::class,'edit']);