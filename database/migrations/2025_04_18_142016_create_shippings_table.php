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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->enum('shipping_status', ['pending', 'delayed', 'shipped'])->default('pending');
            $table->dateTime('shipping_date');
            $table->dateTime('actual_shipping_date');
            $table->dateTime('actual_arrival_date');
            $table->dateTime('arrival_date')->nullable();
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
