<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('price_id');
            $table->integer('person_number');
            $table->decimal('price', 10, 2);
            $table->integer('discount')->nullable();
            $table->unsignedBigInteger('plate_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('plate_id')->references('plate_id')->on('plates')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
