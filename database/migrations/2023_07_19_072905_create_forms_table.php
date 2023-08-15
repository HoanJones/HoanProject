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
            $table->id();
            $table->unsignedBigInteger('instrument_id'); //id nhạc cụ cần mượn
            $table->unsignedBigInteger('user_id'); //id thành viên CLB mượn nhạc cụ
            $table->date('borrowing_date'); // thời gian mượn
            $table->date('due_date'); // thời gian trả dự kiến
            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->timestamps();
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
