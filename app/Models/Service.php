<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_name', 'isActive', 'service_price'];

    public function sample_service()
    {
        return $this->belongsTo(SampleService::class, 'sample_service_id');
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }


    public function stations()
    {
        return $this->belongsToMany(Station::class, 'service_station', 'service_id', 'station_id')
            ->withPivot('service_id', 'station_id')
            ->withTimestamps();
    }


}
