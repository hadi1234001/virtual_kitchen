<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plate_ingredients', function (Blueprint $table) {
            $table->bigIncrements('plate_ingredient_id');
            $table->unsignedBigInteger('plate_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('plate_id')->references('plate_id')->on('plates')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plate_ingredients');
    }
};
