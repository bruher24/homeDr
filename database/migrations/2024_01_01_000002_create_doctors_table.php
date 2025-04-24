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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fio', 64);
            $table->date('dob');
            $table->string('phone', 16);
            $table->string('email', 50);
            $table->string('vk', 100)->nullable();
            $table->string('telegram', 100)->nullable();
            $table->string('viber', 100)->nullable();
            $table->string('whatsapp', 100)->nullable();
            $table->string('skype', 100)->nullable();
            $table->string('zoom', 100)->nullable();
            $table->string('discord', 100)->nullable();
            $table->string('teamspeak', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
