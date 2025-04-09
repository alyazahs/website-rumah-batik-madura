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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('email', 45)->unique();
            $table->string('name', 45);
            $table->string('password', 225);
            $table->enum('level', ['SuperAdmin', 'Admin'])->default('Admin');
            $table->enum('status', ['Active', 'NonActive'])->default('Active');
            $table->string('path', 100)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
