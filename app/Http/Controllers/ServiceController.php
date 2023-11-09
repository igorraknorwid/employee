<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return ServiceResource::collection($services);
    }

    public function store(ServiceRequest $request)
    {      
        $this->authorize('admin-role-controle');
        $service = Service::create($request->validated());
        return new ServiceResource($service);
    }

    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return new ServiceResource($service);
    }

    public function update(ServiceRequest $request, string $id)
    {
        $this->authorize('admin-role-controle');
        $service = Service::findOrFail($id);
        $service->update($request->validated());
        return response()->json(['message' => 'Service updated successfully']);
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $this->authorize('admin-role-controle');
        $service->delete();
        return response()->json(['message' => 'Service deleted successfully'], 200);
    }
}
