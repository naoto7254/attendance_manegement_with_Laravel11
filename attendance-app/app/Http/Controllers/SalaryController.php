<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function showRegisterFrom()
    {
        return view('register_salary');
    }

    public function confirm(Request $request)
    {
        $data = $request->validate([
            'date' => 'required | date',
            'name' => 'required|string|max:255',
            'shift_types' => 'required|array',
        ]);

        return view('confirm_salary', ['data' => $data]);
    }
}
