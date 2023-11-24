<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'day_id',
        'visit_start',
        'IsBookable',
        'IsActive',
    ];

    protected $casts = [        
        'IsBookable' => 'boolean',
        'IsActive' => 'boolean',
    ];

    // Define the relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Define the relationship with the Day model
    public function day()
    {
        return $this->belongsTo(Day::class);
    }

}
