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
        Schema::create('product', function (Blueprint $table) {
            $table->id('idProduct');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nameProduct', 50);
            $table->string('description', 512)->nullable();
            $table->integer('price');
            $table->string('path', 100)->nullable();
            $table->enum('status', ['Available', 'Sold']);
            $table->timestamps();
    
            $table->foreign('sub_category_id')->references('idSubCategory')->on('sub_category')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
