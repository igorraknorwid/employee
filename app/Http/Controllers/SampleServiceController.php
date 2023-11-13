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
        // You may add authorization logic here if needed
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
        // You may add authorization logic here if needed
        $sampleService = SampleService::findOrFail($id);
        $sampleService->update($request->validated());
        return response()->json(['message' => 'SampleService updated successfully']);
    }

    public function destroy(string $id)
    {
        $sampleService = SampleService::findOrFail($id);
        // You may add authorization logic here if needed
        $sampleService->delete();
        return response()->json(['message' => 'SampleService deleted successfully'], 200);
    }
}
