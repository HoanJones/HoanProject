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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_name');
            $table->string('start_time'); //thời gian hoạt động bắt đầu
            $table->string('end_time')->nullable(); // thời gian hoạt động kết thúc
            $table->string('place'); //địa điểm hoạt động
            $table->string('status'); //trạng thái của hoạt động(đang hoạt động/ tạm dừng)
            //$table->string('attandance'); //điểm danh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
