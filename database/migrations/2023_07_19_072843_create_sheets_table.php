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
        Schema::create('sheets', function (Blueprint $table) {
            $table->bigIncrements('id'); //id sheet nhạc
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('instrument_type_id');
            $table->string('name')->nullable();
            $table->string('sheet_image'); //hình ảnh bản sheet
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('instrument_type_id')->references('id')->on('instrument__types')->onDelete('cascade');
            //$table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheets');
    }
};
