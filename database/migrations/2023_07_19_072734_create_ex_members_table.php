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
        Schema::create('ex_members', function (Blueprint $table) {
            $table->id(); // ID của cựu thành viên
            $table->unsignedBigInteger('user_id')->unique(); //ID tài khoản
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ex_members');
    }
};