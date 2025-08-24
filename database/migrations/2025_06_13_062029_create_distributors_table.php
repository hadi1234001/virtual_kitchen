<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->bigIncrements('distributor_id');
            $table->string('user_name', 255)->unique();
            $table->string('first_name', 255);
            $table->string('second_name', 255);
            $table->string('last_name', 255);
            $table->date('birth_date')->nullable();
            $table->string('phone_number', 20);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->unsignedBigInteger('chef_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('chef_id')->references('chef_id')->on('chefs')->onDelete('set null');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};
