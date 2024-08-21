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
            'date' => ['required', 'date'],
            'name' => ['required', 'string', 'max:255', 'exists:part_users,part_timer_name'],
            'shift_types' => ['required', 'array'],
            'morning_bonus' => ['required', 'in:none,10,20,30'],
            'afternoon_bonus' => ['required', 'in:none,10,20,30'],
            'evening_bonus' => ['required', 'in:none,10,20,30'],
            'morning_delay_bonus' => ['required', 'in:none,exist'],
            'afternoon_delay_bonus' => ['required', 'in:none,exist'],
            'evening_delay_bonus' => ['required', 'in:none,exist'],
        ]);

        return view('confirm_salary', ['data' => $data]);
    }
}
