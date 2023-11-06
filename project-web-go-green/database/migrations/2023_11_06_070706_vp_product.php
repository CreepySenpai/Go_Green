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
            $table->increments('id');
            $table->string('ten_sp');
            $table->string('loai_sp');
            $table->integer('so_luong');
            $table->integer('gia');
            $table->string('mo_ta');
            $table->string('hinh_anh');
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
