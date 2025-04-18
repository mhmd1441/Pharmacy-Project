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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name', 50)->unique();
            $table->string('sku', 50)->unique();
            $table->string('description', 100)->nullable();
            $table->string('manufacturer', 50);
            $table->integer('dosage');
            $table->enum('required_status', ['required', 'not_required'])->default('not_required');
            $table->decimal('price', 10, 2);
            $table->date('expiry_date');
            $table->date('production_date');
            $table->foreignId('inventory_id')
                ->constrained('inventories')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
