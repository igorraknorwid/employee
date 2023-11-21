<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'second_name', 'email','IsActive','IsDentistOnly'];
    
    public function sampleServices()
    {
        return $this->belongsToMany(SampleServiceResource::class, 'employee_sample_service', 'employee_id', 'sample_service_id','avatar_src')
            ->withPivot('employee_id', 'sample_service_id')
            ->withTimestamps();
    }
}
