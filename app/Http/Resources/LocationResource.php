<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'location_name' => $this->location_name,
            'isActive' => $this->isActive,
            'google_map_link' => $this->google_map_link,
            'isMapActive' => $this->isMapActive,
            'city' => $this->city,
            'street' => $this->street,
            'zip' => $this->zip_code,
            'local_number' => $this->local_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
