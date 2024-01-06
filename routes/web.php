<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeberController;

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


Route::get('/', [MemeberController::class,'index'])->name('candidate.index')->middleware('auth');

Route::group(['prefix' => 'candidate','as' => 'candidate.'],function (){
    Route::get('/sendMail/{id}', [MemeberController::class,'sendMail'])->name('mail');
    Route::post('/upload/', [MemeberController::class,'uploadFile'])->name('upload');

    Route::get('/{member}/tracking', [MemeberController::class,'tracking'])->name('tracking');
    Route::post('/{member}', [MemeberController::class,'update'])->name('update');

    Route::get('/{member}/formation', [MemeberController::class,'formationForm'])->name('formationForm')->middleware('auth');
    Route::get('/{member}/projectFilePdf', [MemeberController::class,'projectFilePdf'])->name('projectFilePdf')->middleware('auth');
    Route::get('/{member}/candidateInfoPdf', [MemeberController::class,'candidateInfoPdf'])->name('candidateInfoPdf')->middleware('auth');
    Route::get('/{member}/createZipFile', [MemeberController::class,'createZipFile'])->name('createZipFile')->middleware('auth');

});


require __DIR__.'/auth.php';
