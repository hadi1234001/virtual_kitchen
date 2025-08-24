<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id('competition_id');
            $table->string('plate_name', 255);
            $table->string('description', 1500);
            $table->date('competition_date');
            $table->time('start_time');
            $table->string('image_path', 255)->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('competitions');
    }
};

