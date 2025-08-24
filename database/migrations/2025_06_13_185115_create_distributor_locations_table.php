<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('distributor_locations', function (Blueprint $table) {
            $table->bigIncrements('distributor_location_id');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->unsignedBigInteger('distributor_id');
            $table->timestamps();

            $table->foreign('distributor_id')->references('distributor_id')->on('distributors')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distributor_locations');
    }
};
