<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Http\Resources\StationResource;
use App\Http\Requests\StationRequest;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stations = Station::all();
        return StationResource::collection($stations);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(StationRequest $request)
    {       
        $this->authorize('admin-role-controle');   
        $station = Station::create($request->validated());
        return new StationResource($station);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $station = Station::findOrFail($id);
        return new StationResource($station); 
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StationRequest $request, string $id)
    {
        $this->authorize('admin-role-controle'); 
        $station = Station::findOrFail($id);
        $station->update($request->validated());
        return response()->json(['message' => 'Station updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $station = Station::findOrFail($id);
        $this->authorize('admin-role-controle');  
        $station->delete();
        return response()->json(['message' => 'Stations deleted successfully'], 200);
    }
}
