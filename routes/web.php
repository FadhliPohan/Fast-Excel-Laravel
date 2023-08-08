<?php

use App\Http\Controllers\McuDaerahController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('',[McuDaerahController::class,'index'])->name('index');
Route::post('/import',[UserController::class,'import'])->name('import');
Route::post('/importDaerah',[McuDaerahController::class,'import'])->name('importDaerah');

Route::get('/user',[UserController::class,'index'])->name('user');
// Route::get('',[UserController::class,'index']);
