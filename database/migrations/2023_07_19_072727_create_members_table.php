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
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id'); //id của thành viên
            $table->unsignedBigInteger('user_id')->unique(); //id tài khoản
            $table->date('start_time')->nullable(); //thời gian trúng tuyển
            $table->string('level')->nullable(); //trình độ
            $table->text('hobby')->nullable(); //
            $table->string('status')->nullable();
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
        Schema::dropIfExists('members');
    }
};
