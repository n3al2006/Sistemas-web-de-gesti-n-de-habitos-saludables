<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('frequency');
            $table->string('frequency_type'); // Agregamos este campo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('habits');
    }
};
