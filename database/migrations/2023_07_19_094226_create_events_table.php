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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('executive_board_id')->nullable();
            $table->string('event_name')->nullable();
            $table->date('start_time')->nullable(); //thời gian sự kiện bắt đầu
            $table->date('end_time')->nullable(); // thời gian kết thúc
            $table->text('event_address')->nullable();
            $table->unsignedInteger('instrument_num')->nullable();
            $table->unsignedInteger('member_num')->nullable();
            $table->timestamps();
            $table->foreign('executive_board_id')->references('id')->on('executive__boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
