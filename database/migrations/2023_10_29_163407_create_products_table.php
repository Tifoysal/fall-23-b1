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
        //id, name, price, description, image, brand_id, category_id, status, stock
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');//that should be foreignId()
            $table->integer('category_id');
            $table->string('name');
            $table->double('price');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('active');
            $table->integer('stock')->default(10);
            $table->timestamps();
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
