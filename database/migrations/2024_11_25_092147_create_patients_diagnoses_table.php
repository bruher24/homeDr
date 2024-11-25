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
        Schema::create('patients_diagnoses', function (Blueprint $table) {
            $table->foreignId('patient_id');
            $table->foreignId('diagnosis_id');
            $table->date('diagnosis_date');
            $table->boolean('actuality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients_diagnoses');
    }
};
