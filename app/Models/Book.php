<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['book_name', 'category_id', 'author_id', 'book_image', 'book_file',
        'book_description', 'publisher_id', 'quantity_stock', 'product_code', 'price', 'status'];

        public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(Category::class, 'category_id');
        }

        public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(Author::class, 'author_id');
        }

        public function publisher(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(Publisher::class, 'publisher_id');
        }
    use HasFactory;
}
