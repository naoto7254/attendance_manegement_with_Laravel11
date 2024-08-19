<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('part_users')) {
            Schema::create('part_users', function (Blueprint $table) {
                $table->id('part_timer_id');
                $table->string('part_timer_name', 255);
                $table->string('part_timer_email', 100)->unique();
                $table->unsignedTinyInteger('part_timer_level');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part_users');
    }
};
