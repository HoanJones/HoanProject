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
        Schema::create('instruments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('instrument_type_id');
            $table->string('name')->nullable();
            $table->tinyInteger('status')->comment('InstrumentStatusEnum')->index()->default(0); //tình trạng nhạc cụ
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('instrument_type_id')->references('id')->on('instrument_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instruments');
    }
};
