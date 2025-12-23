<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retard;

class RetardController extends Controller
{
    public function index()
    {
        return Retard::with(['agent','saisiPar'])->paginate(25);
    }

    public function show(Retard $retard)
    {
        return $retard->load(['agent','saisiPar']);
    }

    public function destroy(Retard $retard)
    {
        $retard->delete();
        return response()->noContent();
    }
}
