<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->date('order_date');
            $table->time('order_time');
            $table->date('delivery_date')->nullable();
            $table->time('delivery_time')->nullable();
            $table->text('note')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('rate')->unsigned()->nullable();

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('distributor_id')->nullable();
            $table->unsignedBigInteger('status_id');

            $table->decimal('delivery_latitude', 10, 8)->nullable();
            $table->decimal('delivery_longitude', 11, 8)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
            $table->foreign('distributor_id')->references('distributor_id')->on('distributors')->onDelete('set null');
            $table->foreign('status_id')->references('status_id')->on('order_statuses')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
