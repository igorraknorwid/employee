<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $fillable = ['day','day_title', 'week', 'month', 'year'];
    public $timestamps = false;
    
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
