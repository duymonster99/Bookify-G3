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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("order_id");
            $table->decimal("product_name");
            $table->decimal("product_price");
            $table->integer("quantity");
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("books")->onDelete("cascade");
            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
