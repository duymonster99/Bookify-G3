<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["user_id", "order_total", "payment_id", "order_status"];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
