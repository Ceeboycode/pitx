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
        Schema::create('dispatch_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles'); //dagdagan na lang restrictions
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes'); //dagdagan na lang restrictions
            $table->integer('pax_count');
            $table->integer('gate_num'); //not sure if i-FK na din natin to pati yung bay_num, para select select na lang
            $table->integer('bay_num');
            $table->timestamp('time_in');
            $table->timestamp('time_out')->nullable();;
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatch_logs');
    }
};
