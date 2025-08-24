<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competition_clients_rating', function (Blueprint $table) {
            $table->id('competition_clients_rating_id');
            $table->unsignedBigInteger('competition_chefs_id');
            $table->unsignedBigInteger('client_id');
            $table->integer('rate');
            $table->string('comment', 500)->nullable();
            $table->timestamps();
            $table->foreign('competition_chefs_id')->references('competition_chefs_id')->on('competition_chefs')->onDelete('cascade');
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('competition_clients_rating');
    }
};
