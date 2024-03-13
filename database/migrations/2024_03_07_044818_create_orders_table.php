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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('shop_id');
            $table->string('payment_method');
            $table->string('order_status');
            $table->string('delivery_address');
            $table->string('postal_code');
            $table->string('contact_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->text('special_instructions')->nullable();
            $table->string('tracking_number')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
