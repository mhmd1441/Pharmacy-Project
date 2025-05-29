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
        Schema::table('order_medicines', function (Blueprint $table) {
            $table->integer('quantity')->after('medicine_id');
            $table->decimal('price', 8, 2)->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_medicines', function (Blueprint $table) {
            //
        });
    }
};
