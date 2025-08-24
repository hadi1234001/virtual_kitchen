<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('removed_ingredients', function (Blueprint $table) {
            $table->bigIncrements('removed_ingredient_id');
            $table->unsignedBigInteger('order_plate_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->timestamps();

            $table->foreign('order_plate_id')->references('order_plate_id')->on('order_plates')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('removed_ingredients');
    }
};
