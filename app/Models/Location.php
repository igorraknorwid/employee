<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';  
    protected $fillable = ['location_name', 'isActive', 'google_map_link', 'isMapActive','city', 'street', 'zip_code', 'local_number',];
    
    public function stations()
    {
        return $this->hasMany(Station::class, 'location_id');
    }
}
