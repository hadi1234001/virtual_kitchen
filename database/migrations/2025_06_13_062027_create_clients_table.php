<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('name', 255);
            $table->string('mobile_number', 20);
            $table->string('location', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->boolean('is_frozen')->default(false);
            $table->unsignedBigInteger('state_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('state_id')->references('state_id')->on('states')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
