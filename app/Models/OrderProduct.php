<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ["product_id", "order_id", "product_name", "product_price", "quantity"];
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class, "product_id");
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
