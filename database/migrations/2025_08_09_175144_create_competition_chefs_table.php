<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('competition_chefs', function (Blueprint $table) {
            $table->id('competition_chefs_id');
            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('chef_id');
            $table->foreign('competition_id')->references('competition_id')->on('competitions')->onDelete('cascade');
            $table->foreign('chef_id')->references('chef_id')->on('chefs')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('competition_chefs');
    }
};
