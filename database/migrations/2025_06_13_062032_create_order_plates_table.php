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
        Schema::create('order_plates', function (Blueprint $table) {
            $table->id('order_plate_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('plate_id');
            $table->unsignedBigInteger('price_id');

            $table->integer('rate')->nullable();

            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('plate_id')->references('plate_id')->on('plates');
            $table->foreign('price_id')->references('price_id')->on('prices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_plates');
    }
};
