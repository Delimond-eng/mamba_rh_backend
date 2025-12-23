<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::paginate(25);
    }

    public function show(Service $service)
    {
        return $service;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|unique:services,code',
            'nom' => 'required|string',
            'description' => 'nullable|string',
            'actif' => 'boolean',
        ]);

        $s = Service::create($data);
        return response()->json($s, 201);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'code' => 'sometimes|string|unique:services,code,' . $service->id,
            'nom' => 'sometimes|string',
            'description' => 'nullable|string',
            'actif' => 'boolean',
        ]);

        $service->update($data);
        return response()->json($service, 200);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->noContent();
    }
}
