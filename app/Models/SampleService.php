<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleService extends Model
{
    use HasFactory;
    protected $fillable = [
        'sample_service_title', 'sample_service_price', 'sample_service_time', 'IsActive','IsDentistOnly','IsClientVisible'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'service_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public $timestamps = false;
}
