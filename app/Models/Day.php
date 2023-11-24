<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'day_title',
        'week',
        'month',
        'year',
    ];

    // Define the relationship with the Visit model
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
