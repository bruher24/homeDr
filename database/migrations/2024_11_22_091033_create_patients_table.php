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
        Schema::create('patients', function (Blueprint $table) {
            $table->id('patient_id');
            $table->foreignId('user_id');
            $table->string('patient_fio', 64);
            $table->date('patient_dob');
            $table->string('patient_phone', 16);
            $table->string('patient_email', 50);
            $table->string('patient_vk', 100)->nullable();
            $table->string('patient_telegram', 100)->nullable();
            $table->string('patient_viber', 100)->nullable();
            $table->string('patient_whatsapp', 100)->nullable();
            $table->string('patient_skype', 100)->nullable();
            $table->string('patient_zoom', 100)->nullable();
            $table->string('patient_discord', 100)->nullable();
            $table->string('patient_teamspeak', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
