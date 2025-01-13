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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->decimal('cost_price', 11, 2)->nullable();
            $table->decimal('unit_price', 11, 2);
            $table->integer('quantity')->default(0);
            $table->string('unit')->default('pieces');
            $table->integer('reorder_level')->default(10);
            $table->text('description')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('additional_images')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('set null');
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
