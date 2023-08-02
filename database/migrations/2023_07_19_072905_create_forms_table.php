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
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('instrument_id'); //id nhạc cụ cần mượn
            $table->unsignedBigInteger('member_id'); //id thành viên CLB mượn nhạc cụ
            $table->date('borrowed_time')->nullable(); // thời gian mượn
            $table->date('payment_time')->nullable(); // thời gian trả dự kiến
            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            //$table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
