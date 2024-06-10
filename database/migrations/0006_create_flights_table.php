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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->unsignedBigInteger('origin_airport');
            $table->unsignedBigInteger('destination_airport');
            $table->unsignedBigInteger('airline_id');
            $table->unsignedBigInteger('arrival_date');
            $table->unsignedBigInteger('departure_date');
            $table->unsignedBigInteger('airplane_id');
            $table->integer('stopover');
            $table->timestamps();
            $table->foreign('airline_id')->references('id')->on('airlines');
            $table->foreign('origin_airport')->references('id')->on('airports');
            $table->foreign('destination_airport')->references('id')->on('airports');
            $table->foreign('arrival_date')->references('id')->on('schedules');
            $table->foreign('departure_date')->references('id')->on('schedules');
            $table->foreign('airplane_id')->references('id')->on('airplanes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
