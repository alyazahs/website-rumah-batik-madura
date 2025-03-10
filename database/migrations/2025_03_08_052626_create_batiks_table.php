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
        Schema::create('batiks', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama', 100);
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); 
            $table->decimal('harga', 10, 2)->default(0);
            $table->integer('stock')->default(0);
            $table->string('gambar', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batiks');
    }
};
