<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $fillable = ["user_id", "email", "reset_code"];


    use HasFactory;
    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
