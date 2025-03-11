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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama admin
            $table->string('email')->unique(); // Email harus unik
            $table->string('password'); // Password yang dienkripsi
            $table->enum('role', ['super_admin', 'admin'])->default('admin'); // Role untuk multi-level admin
            $table->unsignedBigInteger('created_by')->nullable(); // Siapa yang membuat akun admin ini (hanya untuk super admin)
            $table->timestamp('last_login')->nullable(); // Terakhir login
            $table->timestamps();

            // Foreign key untuk mencatat siapa yang membuat akun admin
            $table->foreign('created_by')->references('id')->on('admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
