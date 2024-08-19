<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('part_users')->insert([
            'part_timer_name' => '武田 直人',
            'part_timer_email' => 'naototakeda@gmail.com',
            'part_timer_level' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
