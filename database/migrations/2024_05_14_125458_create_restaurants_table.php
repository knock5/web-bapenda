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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id('restaurant_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('opening_hours')->nullable();
            $table->string('closing_hours')->nullable();
            $table->bigInteger('revenue');
            $table->float('tax_rate');
            $table->string('tax_id_number');
            $table->date('tax_due_date');
            $table->date('last_tax_payment')->nullable();
            $table->boolean('is_tax_paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
