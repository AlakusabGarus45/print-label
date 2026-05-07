<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartoonLabelController;

Route::get('/',[CartoonLabelController::class,'index'])->name('index');

Route::prefix('company')->name('company.')->group(function () {
    Route::get('/add-company',[CartoonLabelController::class,'addCompany'])->name('add');
    Route::post('/store/company',[CartoonLabelController::class,'storeCompany'])->name('store');
    Route::get('/view/company',[CartoonLabelController::class,'viewCompany'])->name('show');
});

Route::prefix('retail')->name('retail.')->group(function () {
    Route::get('/add-retail',[CartoonLabelController::class,'addRetail'])->name('add');
    Route::post('/store/retail',[CartoonLabelController::class,'storeRetail'])->name('store');
    Route::get('/view/retail',[CartoonLabelController::class,'viewRetail'])->name('show');
});

Route::get('/print-label',[CartoonLabelController::class,'printLabel'])->name('printLabel');
Route::post('/printLabel',[CartoonLabelController::class,'print'])->name('print.label');

Route::get('/scanner',function (){
    return view('scanner');
});

Route::post('/get-model', [CartoonLabelController::class, 'getModel']);


