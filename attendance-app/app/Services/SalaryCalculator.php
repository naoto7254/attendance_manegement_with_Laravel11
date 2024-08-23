<?php

namespace App\Services;

class SalaryCalculator
{
    private static array $morningSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];
    private static  array $afternoonSalaries = [1000, 1000, 1000, 1000, 1000, 1000, 1000];
    private static  array $eveningSalaries = [1000, 1800, 2400, 2500, 2600, 2700, 2800];

    private static array $bonusSalaries = [
        '10minutes_less' => 200,
        '20minutes_less' => 500,
        '30minutes_less' => 800
    ];

    private static array $bonusTickets = [
        '10minutes_less' => 1,
        '20minutes_less' => 2,
        '30minutes_less' => 3
    ];

    public static function calcBaseSalary(int $level, string $shiftType): int
    {
        $level = $level - 1;

        switch ($shiftType) {
            case 'morning':
                return self::$morningSalaries[$level];
            case 'afternoon':
                return self::$afternoonSalaries[$level];
            case 'night':
                return self::$eveningSalaries[$level];
        }
    }

    public static function calcBonusSalary(int $level, string $bonusLevel)
    {
        if ($level === 1) {
            return 0;
        } elseif ($level < 5) {
            return self::$bonusSalaries[$bonusLevel];
        } else {
            return self::$bonusTickets[$bonusLevel];
        }
    }

    public static function calcDelaySalary()
    {
        return 500;
    }
}
