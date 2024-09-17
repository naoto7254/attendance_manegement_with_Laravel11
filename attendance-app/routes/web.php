<?php

use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalaryInfoController;
use App\Http\Controllers\SalaryRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/register-salary', [SalaryController::class, 'showRegisterForm'])->name('salary.register');
Route::post('/confirm-salary', [SalaryController::class, 'confirm'])->name('salary.confirm');
Route::post('/registered-salary', [SalaryInfoController::class, 'storeAndShow'])->name('salary.registered');
Route::get('/salary-info', [SalaryRecordController::class, 'index'])->name('salary.info');
