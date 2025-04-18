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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount_paid');
            $table->enum('payment_type', ['USD', 'EURO', 'LBP'])->default('USD');
            $table->enum('payment_method', ['card', 'cash'])->default('cash');
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->foreignId('order_id')
                ->constrained('orders')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
