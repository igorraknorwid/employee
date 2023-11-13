<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SampleServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            
            'sample_service_title' => $this->sample_service_title,
            'sample_service_price' => $this->sample_service_price,
            'sample_service_time' => $this->sample_service_time,        
            'IsDentistOnly' => $this->IsDentistOnly,
            'IsClientVisiable' => $this->IsClientVisiable,

            'IsActive' => $this->IsActive,
        ];
    }
}
