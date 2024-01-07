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


    Route::prefix('{member}')->group(function () {
        Route::post('/', [MemeberController::class, 'update'])->name('update');
        Route::get('/tracking', [MemeberController::class, 'tracking'])->name('tracking');

        // Add middleware to multiple routes
        Route::middleware('auth')->group(function () {
            Route::get('/formation', [MemeberController::class, 'formationForm'])->name('formationForm');
            Route::get('/projectFilePdf', [MemeberController::class, 'projectFilePdf'])->name('projectFilePdf');
            Route::get('/candidateInfoPdf', [MemeberController::class, 'candidateInfoPdf'])->name('candidateInfoPdf');
            Route::get('/createZipFile', [MemeberController::class, 'createZipFile'])->name('createZipFile');
        });
    });

});


require __DIR__.'/auth.php';
