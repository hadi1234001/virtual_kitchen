<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->bigIncrements('plate_id');
            $table->string('plate_name', 255);
            $table->string('description', 1500);
            $table->string('photo_path', 255)->nullable();
            $table->boolean('is_archived')->default(false);
            $table->unsignedBigInteger('sub_type_id')->nullable();
            $table->unsignedBigInteger('chef_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sub_type_id')->references('sub_type_id')->on('sub_types')->onDelete('set null');
            $table->foreign('chef_id')->references('chef_id')->on('chefs')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plates');
    }
};
