<?php

namespace App\Http\Controllers;

use App\Models\DentalRole;
use App\Http\Resources\DentalRoleResource;
use App\Http\Requests\DentalRoleRequest;

class DentalRoleController extends Controller
{
    public function index()
    {
        $dentalRoles = DentalRole::all();
        return DentalRoleResource::collection($dentalRoles);
    }

    public function store(DentalRoleRequest $request)
    {
        $this->authorize('admin-role-control');
        $dentalRole = DentalRole::create($request->validated());
        return new DentalRoleResource($dentalRole);
    }

    public function show(string $id)
    {
        $dentalRole = DentalRole::findOrFail($id);
        return new DentalRoleResource($dentalRole);
    }

    public function update(DentalRoleRequest $request, string $id)
    {
        $this->authorize('admin-role-control');
        $dentalRole = DentalRole::findOrFail($id);
        $dentalRole->update($request->validated());
        return response()->json(['message' => 'Dental role updated successfully']);
    }

    public function destroy(string $id)
    {
        $dentalRole = DentalRole::findOrFail($id);
        $this->authorize('admin-role-control');
        $dentalRole->delete();
        return response()->json(['message' => 'Dental role deleted successfully'], 200);
    }
}
