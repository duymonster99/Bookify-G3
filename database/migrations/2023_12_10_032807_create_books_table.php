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
        Schema::create('books', function (Blueprint $table) {
            Schema::create('books', function (Blueprint $table) {
                $table->id();
                $table->string('book_name')->unique();
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('author_id');
                $table->string('book_image')->nullable();
                $table->string('book_file')->nullable();
                $table->text('book_description');
                $table->unsignedBigInteger('publisher_id');
                $table->integer('quantity_stock');
                $table->string('product_code')->unique();
                $table->decimal('price', 10, 2);
                $table->string('status');
                $table->timestamps();

                // foreign key constraints
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
                $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
