<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryRecord;
use App\Models\PartUsers;

class SalaryInfoController extends Controller
{
    public function storeAndShow(Request $request)
    {
        $jsonData = $request->input('insertData');
        $insertData = json_decode($jsonData, true);

        $salaryRecord = SalaryRecord::create([
            'date' => $insertData['date'],
            'part_timer_id' => $insertData['part_timer_id'],
            'part_timer_name' => $insertData['part_timer_name'],
            'shift_salaries' => $insertData['shift_salaries'],
            'bonus_info' => $insertData['bonus_info'],
            'delay_bonus_info' => $insertData['delay_bonus_info']
        ]);

        return view('registered_salary', [
            'insertData' => $insertData
        ]);
    }
}
