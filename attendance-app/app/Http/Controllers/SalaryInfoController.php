<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryRecord;
use App\Models\PartUsers;

class SalaryInfoController extends Controller
{
    public function store(Request $request)
    {
        // ToDo
        // 文字列で受け取りこのコントローラーで操作する
        $data = $request->input('data');
        $partUser = $request->input('partUser');
        $baseSalary = $request->input('baseSalary');
        $bonusSalary = $request->input('bonusSalary');

        $insertData = $data;

        return view('registered_salary', [
            'insertData' => $insertData
        ]);

        // $bonusInfo = [
        //     $bonusSalary['morning']['morningBonusSalary'],
        //     $bonusSalary['afternoon']['afternoonBonusSalary'],
        //     $bonusSalary['evening']['eveningBonusSalary']
        // ];

        // $delayBonusInfo = [
        //     $bonusSalary['morning']['morningDelayBonusSalary'],
        //     $bonusSalary['afternoon']['afternoonDelayBonusSalary'],
        //     $bonusSalary['evening']['eveningDelayBonusSalary']
        // ];

        // $insertData = [
        //     'date' => $data['date'],
        //     'part_timer_id' => $partUser->part_timer_id,
        //     'part_timer_name' => $partUser->part_timer_name,
        //     'shift_salaries' => $baseSalary,
        //     'bonus_info' => $bonusInfo,
        //     'delay_bonus_info' => $delayBonusInfo
        // ];

        // return view('registered_salary', [
        //     'insertData' => $insertData
        // ]);
    }
}
