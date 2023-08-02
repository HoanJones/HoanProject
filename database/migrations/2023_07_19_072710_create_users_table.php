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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); //id tài khoản người dùng
            $table->string('password');
            $table->string('name', 50)->nullable();
            //$table->string('role'); //vai trò của tài khoản
            $table->enum('role', ['Admin', 'Member', 'Ex_Member']);
            $table->unsignedBigInteger('role_id'); //ID role của user
            $table->date('birthday')->nullable(); //NTNS
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('sex', 10)->nullable(); //giới tính
            $table->string('address')->nullable();
            //$table->integer('phone_number', 10)->nullable();
            $table->char('phone_number', 10)->nullable();
            $table->string('job', 100)->nullable();
            $table->string('work_place')->nullable(); //địa chỉ nơi làm việc
            $table->rememberToken();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::dropIfExists('users');
    }
};
