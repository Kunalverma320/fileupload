<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[DocumentController::class,'index'])->name('home');


Route::get('documents/list', [DocumentController::class, 'list'])->name('documents.list');
Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store');
