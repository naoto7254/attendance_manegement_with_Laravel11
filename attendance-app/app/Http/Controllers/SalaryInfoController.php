<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryRecord;
use App\Models\PartUsers;

class SalaryInfoController extends Controller
{
    public function store(Request $request)
    {
        $insertData = $request->input('insertData');

        return view('registered_salary', [
            'insertData' => $insertData
        ]);
    }
}
