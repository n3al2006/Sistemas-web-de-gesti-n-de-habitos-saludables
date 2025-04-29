<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('user_habits', function (Blueprint $table) {
            $table->time('reminder_time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user_habits', function (Blueprint $table) {
            $table->dropColumn('reminder_time');
        });
    }
};