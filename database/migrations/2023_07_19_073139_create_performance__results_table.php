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
        Schema::create('performance__results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('term')->nullbale(); //kỳ hoạt động
            $table->text('result_infor')->nullable(); //thông tin kết quả
            $table->string('evalute', 30)->nullable(); //đánh giá kết quả hoạt động
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            //$table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance__results');
    }
};
