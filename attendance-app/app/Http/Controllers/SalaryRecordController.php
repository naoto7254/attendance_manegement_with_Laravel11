<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryRecord;

class SalaryRecordController extends Controller
{
    public function index()
    {
        $salaryRecord = SalaryRecord::all();

        var_dump($salaryRecord);

        return view('salary_info', [
            'salaryRecord' => $salaryRecord
        ]);
    }
}
