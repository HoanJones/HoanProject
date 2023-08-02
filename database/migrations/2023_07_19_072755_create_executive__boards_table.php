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
        Schema::create('executive__boards', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID của ban điều hành
            $table->unsignedBigInteger('user_id'); //ID tài khoản
            $table->string('level')->nullable(); //Trình độ
            $table->string('forte')->nullable(); //sở trường
            $table->string('term')->nullable();
            //$table->timestamp();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('executive__boards');
    }
};
