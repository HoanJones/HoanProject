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
        Schema::create('ex__members', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID của cựu thành viên
            $table->unsignedBigInteger('user_id'); //ID tài khoản
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
            //$table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ex__members');
    }
};
