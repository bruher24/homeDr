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
        Schema::create('doctors_diplomas', function (Blueprint $table) {
            $table->foreignId('doctor_id')->constrained('doctors', 'doctor_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('diploma_id')->constrained('diplomas', 'diploma_id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_diplomas');
    }
};
