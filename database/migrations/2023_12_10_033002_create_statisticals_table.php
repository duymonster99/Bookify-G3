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
        Schema::create('statisticals', function (Blueprint $table) {
            $table->id();
            $table->string('order_date');
            $table->string('sales');
            $table->string('profit');
            $table->int('quantity');
            $table->int('total_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statisticals');
    }
};
