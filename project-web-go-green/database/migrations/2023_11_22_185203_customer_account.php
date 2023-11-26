<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cus_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('cus_name');
            $table->string('cus_email')->unique();
            $table->string('cus_password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cus_accounts');
    }
};
