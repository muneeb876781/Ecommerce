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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('shop_id')->constrained('seller_shops')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('discountedPrice')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('remote_image_url', 1024)->nullable();
            $table->string('image_url')->nullable();
            $table->string('media1_url')->nullable();
            $table->string('media2_url')->nullable();
            $table->string('media3_url')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('quantity');
            $table->string('sku')->nullable();
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
