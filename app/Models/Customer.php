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
        'phone',
        'phone_code',
        'phone_verified_at',
        'email',
        'email_verified_at',
        'remember_token',
        'isActive',
        'sex',
        'birthday',
    ];

    protected $hidden = [
        'password', // Assuming you have a password field in your customers table
    ];

    protected $casts = [
        'phone_verified_at' => 'datetime',
        'email_verified_at' => 'datetime',       
    ];

    // Define the relationship with the Visit model
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
