<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'second_name',
        'email',
        'phone_number',
        'phone_code',
        'phone_verified_at',
        'remember_token',
        'birthday',
        'sex',
        'isActive',
    ];
    
    protected $casts = [
        'phone_verified_at' => 'datetime',
        'birthday' => 'date',
        'isActive' => 'boolean',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
