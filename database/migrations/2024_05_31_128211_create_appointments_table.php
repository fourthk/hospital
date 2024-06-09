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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('no_appointment');
            $table->string('id_user');
            $table->string('id_doctor');
            $table->foreignId('id_plan')->references('id')->on('plans');
            $table->string('telephone');
            $table->string('date');
            $table->string('status');
            $table->string('status_payment');
            $table->string('payment_photo_path')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
