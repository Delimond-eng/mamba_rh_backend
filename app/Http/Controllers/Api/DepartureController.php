<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departure;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function index()
    {
        return Departure::with(['agent','saisiPar'])->paginate(25);
    }

    public function show(Departure $departure)
    {
        return $departure->load(['agent','saisiPar']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|integer|exists:agents,id',
            'type' => 'required|in:demission,desertion,licenciement,essai_nc,deces',
            'date_depart' => 'required|date',
            'motif' => 'nullable|string',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $d = Departure::create($data);
        return response()->json($d, 201);
    }

    public function update(Request $request, Departure $departure)
    {
        $data = $request->validate([
            'type' => 'sometimes|in:demission,desertion,licenciement,essai_nc,deces',
            'date_depart' => 'sometimes|date',
            'motif' => 'nullable|string',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $departure->update($data);
        return response()->json($departure, 200);
    }

    public function destroy(Departure $departure)
    {
        $departure->delete();
        return response()->noContent();
    }
}
