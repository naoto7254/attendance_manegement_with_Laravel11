<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryRecord extends Model
{
    use HasFactory;

    protected $table = 'salary_records';

    protected $fillable = [
        'date',
        'part_timer_id',
        'part_timer_name',
        'shift_salaries',
        'bonus_info',
        'delay_bonus_info',
    ];

    protected $casts = [
        'date' => 'date',
        'shift_salaries' => 'array',
        'bonus_info' => 'array',
        'delay_bonus_info' => 'array',
    ];
}
