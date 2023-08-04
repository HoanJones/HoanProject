<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->string('name', 50)->nullable();
            $table->tinyInteger('role')->index()->default(2); //role: superadmin=0; admin=1; member = 2;
            $table->date('birthday')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('gender')->nullable(); //giới tính: nam = 0; nu = 1;
            $table->string('address')->nullable();
            $table->char('phone_number', 10)->nullable();
            $table->string('job', 100)->nullable();
            $table->string('work_place')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
