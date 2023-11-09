<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $fillable = ['station_name', 'isActive', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_station', 'station_id', 'service_id')
            ->withPivot('service_id', 'station_id')
            ->withTimestamps();
    }
}
