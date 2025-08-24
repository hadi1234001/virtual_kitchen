<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->bigIncrements('chef_id');
            $table->string('user_name', 255)->unique();
            $table->string('first_name', 255);
            $table->string('second_name', 255);
            $table->string('last_name', 255);
            $table->string('image_path', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->text('overview')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('mobile_number', 20);
            $table->string('cv_path', 255)->nullable();
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
        Schema::dropIfExists('chefs');
    }
};
