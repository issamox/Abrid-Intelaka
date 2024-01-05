<?php

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

Route::get('/', [\App\Http\Controllers\MemeberController::class,'index']);
Route::get('/sendMail/{id}', [\App\Http\Controllers\MemeberController::class,'sendMail'])->name('candidate.mail');
Route::get('candidate/tracking/{id}', [\App\Http\Controllers\MemeberController::class,'tracking'])->name('candidate.tracking');
Route::post('candidate/upload/', [\App\Http\Controllers\MemeberController::class,'uploadFile'])->name('candidate.upload');

Route::post('candidate/{member}', [\App\Http\Controllers\MemeberController::class,'update'])->name('candidate.update');
