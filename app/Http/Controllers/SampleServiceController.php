<?php

namespace App\Http\Controllers;

use App\Models\SampleService;
use App\Http\Resources\SampleServiceResource;
use App\Http\Requests\SampleServiceRequest;

class SampleServiceController extends Controller
{
    public function index()
    {
        $sampleServices = SampleService::all();
        return SampleServiceResource::collection($sampleServices);
    }

    public function store(SampleServiceRequest $request)
    {
      
        
        $this->authorize('admin-role-controle');
       
         $sampleService = SampleService::create($request->validated());
        return new SampleServiceResource($sampleService);
    }

    public function show(string $id)
    {
        $sampleService = SampleService::findOrFail($id);
        return new SampleServiceResource($sampleService);
    }

    public function update(SampleServiceRequest $request, string $id)
    {
        $this->authorize('admin-role-controle');
        $sampleService = SampleService::findOrFail($id);
        $sampleService->update($request->validated());
        return response()->json(['message' => 'SampleService updated successfully']);
    }

    public function destroy(string $id)
    {
        $sampleService = SampleService::findOrFail($id);
        $this->authorize('admin-role-controle');
        $sampleService->delete();
        return response()->json(['message' => 'SampleService deleted successfully'], 200);
    }
}
