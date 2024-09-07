<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartUsers;
use App\Services\SalaryCalculator;

class SalaryController extends Controller
{
    public function showRegisterForm()
    {
        return view('register_salary');
    }

    public function confirm(Request $request)
    {
        $data = $request->validate([
            'date' => ['required', 'date'],
            'name' => ['required', 'string', 'max:255', 'exists:part_users,part_timer_name'],
            'shift_types' => ['required', 'array'],
            'morning_bonus' => ['required', 'in:none,10minutes_less,20minutes_less,30minutes_less'],
            'afternoon_bonus' => ['required', 'in:none,10minutes_less,20minutes_less,30minutes_less'],
            'evening_bonus' => ['required', 'in:none,10minutes_less,20minutes_less,30minutes_less'],
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

        // MySQLからユーザー情報を取得
        $partUser = PartUsers::where('part_timer_name', $data['name'])->firstOrFail();
        $partUserLevel = $partUser->part_timer_level;

        // 基本給料の計算
        $baseSalary = [];
        foreach ($data['shift_types'] as $shiftType) {
            $baseSalary[$shiftType] = SalaryCalculator::calcBaseSalary($partUserLevel, $shiftType);
        }

        // 短縮ボーナスの計算
        $bonusSalary = [
            'morning' => [
                'morningBonusSalary' => $this->calculateBonusSalary($partUserLevel, $data['morning_bonus']),
                'morningDelayBonusSalary' => $this->calculateDelayBonusSalary($data['morning_delay_bonus'])
            ],
            'afternoon' => [
                'afternoonBonusSalary' => $this->calculateBonusSalary($partUserLevel, $data['afternoon_bonus']),
                'afternoonDelayBonusSalary' => $this->calculateDelayBonusSalary($data['afternoon_delay_bonus'])
            ],
            'evening' => [
                'eveningBonusSalary' => $this->calculateBonusSalary($partUserLevel, $data['evening_bonus']),
                'eveningDelayBonusSalary' => $this->calculateDelayBonusSalary($data['evening_delay_bonus'])
            ]
        ];


        // returnさせたいデータ
        $tableDataBasicSalary = $this->toTableBasicSalaryResult($baseSalary);
        $tableDataBonusSalary = $this->toTableBonusSalaryResult($bonusSalary);

        return view('confirm_salary', [
            'data' => $data,
            'partUser' => $partUser,
            'baseSalary' => $baseSalary,
            'bonusSalary' => $bonusSalary,
            'tableDataBasicSalary' => $tableDataBasicSalary,
            'tableDataBonusSalary' => $tableDataBonusSalary,
        ]);
    }

    private function calculateBonusSalary(int $level, string $bonusType): array
    {
        if ($bonusType === 'none') {
            return ['salary' => 0];
        }

        return SalaryCalculator::calcBonusSalary($level, $bonusType);
    }

    private function calculateDelayBonusSalary(string $bonusType): array
    {
        if ($bonusType === 'none') {
            return ['salary' => 0];
        }

        return SalaryCalculator::calcDelaySalary();
    }

    private function toTableBasicSalaryResult($basicSalary): array
    {
        $tableDataBasicSalary = [
            'info' => ['シフトタイプ', '勤務有無', '発生給与'],
            'morning' => ['朝', 'なし', '0円'],
            'afternoon' => ['昼', 'なし', '0円'],
            'evening' => ['夕', 'なし', '0円']
        ];

        foreach ($basicSalary as $shiftType => $bonus) {
            $tableDataBasicSalary[$shiftType][1] = 'あり';
            $tableDataBasicSalary[$shiftType][2] = "{$bonus}円";
        }

        return $tableDataBasicSalary;
    }

    private function toTableBonusSalaryResult($bonusSalary): array
    {
        $tableDataBonusSalary = [
            'info' => [
                'シフトタイプ',
                '短縮ボーナス',
                '遅延ボーナス'
            ],
            'morning' => [
                '朝',
                'morningBonusSalary' => 'なし',
                'morningDelayBonusSalary' => 'なし'
            ],
            'afternoon' => [
                '昼',
                'afternoonBonusSalary' => 'なし',
                'afternoonDelayBonusSalary' => 'なし'
            ],
            'evening' => [
                '夕',
                'eveningBonusSalary' => 'なし',
                'eveningDelayBonusSalary' => 'なし'
            ]
        ];

        // ネストしすぎ...
        foreach ($bonusSalary as $shiftType => $bonuses) {
            foreach ($bonuses as $bonusKey => $bonus) {
                foreach ($bonus as $attribute => $value) {

                    switch ($attribute) {
                        case 'ticket':
                            $tableDataBonusSalary[$shiftType][$bonusKey] = "チケット: {$bonus['ticket']}枚";
                            break;
                        default:
                            $tableDataBonusSalary[$shiftType][$bonusKey] = "{$bonus['salary']}円";
                            break;
                    }
                }
            }
        }

        return $tableDataBonusSalary;
    }
}
