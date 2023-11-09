<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminToken extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'crypted_email',       
    ];

    protected $hidden = [
        'token',
        'crypted_email', 
    ];

    protected $casts = [
        'last_visited_at' => 'datetime',      
    ];
}
