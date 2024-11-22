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
            $table->string('patient_fio', 64);
            $table->date('dob');
            $table->string('patient_phone', 16);
            $table->string('patient_email', 50);
            $table->string('vk', 100);
            $table->string('telegram', 100);
            $table->string('viber', 100);
            $table->string('whatsapp', 100);
            $table->text('anamnesis');
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
