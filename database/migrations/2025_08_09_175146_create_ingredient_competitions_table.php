<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ingredients_competitions', function (Blueprint $table) {
            $table->id('ingredients_competitions_id');
            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('competition_id')->references('competition_id')->on('competitions')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('ingredients_competitions');
    }
};
