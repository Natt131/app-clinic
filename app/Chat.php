<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
