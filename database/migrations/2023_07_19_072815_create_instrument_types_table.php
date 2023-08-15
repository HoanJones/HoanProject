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
        Schema::create('instrument_types', function (Blueprint $table) {
            $table->id(); //ID loại nhạc cụ
            $table->string('name')->unique(); //tên loại nhạc cụ
            $table->text('description')->nullable(); //thông tin về loại nhạc cụs
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrument_types');
    }
};
