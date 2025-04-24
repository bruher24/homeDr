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
        Schema::create('patients_anamneses', function (Blueprint $table) {
            $table->foreignId('patient_id')->constrained('patients', 'patient_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('anamnesis_id')->constrained('anamneses', 'anamnesis_id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients_anamneses');
    }
};
