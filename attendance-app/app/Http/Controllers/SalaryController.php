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
        ], [
            'date.required' => '日付を入力してください。',
            'date.date' => '正しい日付形式で入力してください。',
            'name.required' => '名前を入力してください。',
            'name.string' => '名前は文字列で入力してください。',
            'name.max' => '名前は255文字以内で入力してください。',
            'name.exists' => '指定された名前は存在しません。',
            'shift_types.required' => 'シフトタイプを選択してください。',
            'shift_types.array' => 'シフトタイプの形式が正しくありません。',
            'morning_bonus.required' => '朝のボーナスを選択してください。',
            'morning_bonus.in' => '朝のボーナスの選択が無効です。',
            'afternoon_bonus.required' => '昼のボーナスを選択してください。',
            'afternoon_bonus.in' => '昼のボーナスの選択が無効です。',
            'evening_bonus.required' => '夜のボーナスを選択してください。',
            'evening_bonus.in' => '夜のボーナスの選択が無効です。',
            'morning_delay_bonus.required' => '朝の遅延ボーナスを選択してください。',
            'morning_delay_bonus.in' => '朝の遅延ボーナスの選択が無効です。',
            'afternoon_delay_bonus.required' => '昼の遅延ボーナスを選択してください。',
            'afternoon_delay_bonus.in' => '昼の遅延ボーナスの選択が無効です。',
            'evening_delay_bonus.required' => '夜の遅延ボーナスを選択してください。',
            'evening_delay_bonus.in' => '夜の遅延ボーナスの選択が無効です。',
        ]);

        return view('confirm_salary', ['data' => $data]);
    }
}
