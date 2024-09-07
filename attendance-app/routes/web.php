<?php

use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalaryInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/register-salary', [SalaryController::class, 'showRegisterForm'])->name('salary.register');
Route::post('/confirm-salary', [SalaryController::class, 'confirm'])->name('salary.confirm');
Route::post('/registered-salary', [SalaryInfoController::class, 'store'])->name('salary.registered');
