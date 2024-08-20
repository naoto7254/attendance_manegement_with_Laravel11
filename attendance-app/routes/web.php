<?php

use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/register-salary', [SalaryController::class, 'showRegisterFrom'])->name('register.salary');
Route::post('/confirm-salary', [SalaryController::class, 'confirm'])->name('confirm.salary');
