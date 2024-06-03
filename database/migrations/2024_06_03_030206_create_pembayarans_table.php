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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->nullable()->constrained('restaurants', 'restaurant_id')->onDelete('cascade');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels', 'hotel_id')->onDelete('cascade');
            $table->string('ammount');
            $table->string('status');
            $table->string('payment_method');
            $table->string('transaction_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
