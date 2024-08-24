<?php

use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/register-salary', [SalaryController::class, 'showRegisterForm'])->name('salary.register');
Route::post('/confirm-salary', [SalaryController::class, 'confirm'])->name('salary.confirm');
