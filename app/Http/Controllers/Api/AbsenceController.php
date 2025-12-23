<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        return Absence::with(['agent','saisiPar'])->paginate(25);
    }

    public function show(Absence $absence)
    {
        return $absence->load(['agent','saisiPar']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|integer|exists:agents,id',
            'type_absence' => 'required|in:12h,24h',
            'motif' => 'nullable|string',
            'date_absence' => 'required|date',
            'saisi_par' => 'nullable|integer|exists:users,id',
            'locked' => 'boolean',
        ]);

        $absence = Absence::create($data);

        return response()->json($absence, 201);
    }

    public function update(Request $request, Absence $absence)
    {
        $data = $request->validate([
            'type_absence' => 'sometimes|in:12h,24h',
            'motif' => 'nullable|string',
            'date_absence' => 'sometimes|date',
            'saisi_par' => 'nullable|integer|exists:users,id',
            'locked' => 'boolean',
        ]);

        $absence->update($data);

        return response()->json($absence, 200);
    }

    public function destroy(Absence $absence)
    {
        $absence->delete();
        return response()->noContent();
    }
}
