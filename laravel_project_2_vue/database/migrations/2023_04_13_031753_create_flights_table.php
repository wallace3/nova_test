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
            $table->timestamps();
            $table->string('code');
            $table->integer('departure_id');
            $table->integer('destination_id');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->integer('airline_id');
            $table->enum('type', array('passenger', 'freight'));
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
