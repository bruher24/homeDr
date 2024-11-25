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
            $table->id('doctor_id');
            $table->foreignId('user_id');
            $table->string('doctor_fio', 64);
            $table->date('doctor_dob');
            $table->string('doctor_phone', 16);
            $table->string('doctor_email', 50);
            $table->string('doctor_vk', 100)->nullable();
            $table->string('doctor_telegram', 100)->nullable();
            $table->string('doctor_viber', 100)->nullable();
            $table->string('doctor_whatsapp', 100)->nullable();
            $table->string('doctor_skype', 100)->nullable();
            $table->string('doctor_zoom', 100)->nullable();
            $table->string('doctor_discord', 100)->nullable();
            $table->string('doctor_teamspeak', 100)->nullable();
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
