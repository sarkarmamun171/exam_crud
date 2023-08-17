<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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


Route::get('/', [LoginController::class,'showLoginForm'])->name('dashboard');
Route::post('/submit-login',[LoginController::class,'login'])->name('login');
Route::get('/dashboard',[LoginController::class,'dashboard'])->name('admindashboard');
Route::post('/savequestion',[LoginController::class,'savequestion'])->name('save.question');
Route::get('/allquestion',[LoginController::class,'allquestion']);
Route::get('/deleteques/{id}',[LoginController::class,'deleteques']);
Route::get('/editquestion/{id}',[LoginController::class,'editquestion']);
Route::post('/update',[LoginController::class,'updatequestion'])->name('update.question');



