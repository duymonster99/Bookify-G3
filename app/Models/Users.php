<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ["email", "username", "password", "lastname", "firstname", "phone", "time_set", "role"];
    use HasFactory;

    public function resetPassword()
    {
        return $this->hasMany(ResetPassword::class);
    }
}
