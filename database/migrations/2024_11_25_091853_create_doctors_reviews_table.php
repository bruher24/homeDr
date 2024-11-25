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
        Schema::create('doctors_reviews', function (Blueprint $table) {
            $table->foreignId('doctor_id');
            $table->foreignId('patient_id');
            $table->dateTime('review_dt');
            $table->text('review_text');
            $table->unsignedTinyInteger('stars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_reviews');
    }
};
