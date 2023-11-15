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
        Schema::create('vp_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->integer('product_price');
            $table->integer('product_count');
            $table->text('product_desc');
            $table->string('product_image');
            $table->integer('product_type')->unsigned();
            $table->foreign('product_type')->references('cate_id')->on('vp_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vp_products');
    }
};
