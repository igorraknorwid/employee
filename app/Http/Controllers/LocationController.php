<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Resources\LocationResource;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    public function index()
    { $locations = Location::all();
        return LocationResource::collection($locations); }

    public function store(LocationRequest $request)
    {   $this->authorize('admin-role-controle');   
        $location = Location::create($request->validated());
        return new LocationResource($location); }

    public function show(string $id)
    {   $location = Location::findOrFail($id);
        return new LocationResource($location);  }

    public function update(LocationRequest $request, string $id)
    {   $this->authorize('admin-role-controle'); 
        $location = Location::findOrFail($id);
        $location->update($request->validated());
        return response()->json(['message' => 'Location updated successfully']);}

    public function destroy(string $id)
    { $location = Location::findOrFail($id);
        $this->authorize('admin-role-controle');  
        $location->delete();
        return response()->json(['message' => 'Location deleted successfully'], 200); }
}
