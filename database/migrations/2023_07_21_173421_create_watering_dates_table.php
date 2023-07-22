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
        Schema::create('watering_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_plant_id')->unique();
            $table->foreign('my_plant_id')->references('id')->on('my_plants');
            $table->date('watered_on');
            $table->date('next_date_water');
            $table->integer('days_to_water');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watering_dates');
    }
};
