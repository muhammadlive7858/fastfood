<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_food', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('food_name');
            $table->integer('food_price');
            $table->integer('food_count');

            $table->integer('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_food');
    }
};
