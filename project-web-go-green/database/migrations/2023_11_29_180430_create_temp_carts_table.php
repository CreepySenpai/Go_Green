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
        Schema::create('temp_carts', function (Blueprint $table) {
            $table->string('product_title')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('product_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_carts');
    }
};
