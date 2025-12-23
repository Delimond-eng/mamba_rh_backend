<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AbsenceController;
use App\Http\Controllers\Api\SanctionController;
use App\Http\Controllers\Api\MouvementController;
use App\Http\Controllers\Api\DepartureController;
use App\Http\Controllers\Api\AppelNonReponduController;
use App\Http\Controllers\Api\VehiculeController;
use App\Http\Controllers\Api\VehiculeRapportController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\AgentServiceHistoryController;
use App\Http\Controllers\Api\BaremeSalariauxController;
use App\Http\Controllers\Api\AgentBaremeController;
use App\Http\Controllers\Api\AutorisationTypeController;
use App\Http\Controllers\Api\AgentAutorisationController;

Route::middleware(['cors'])->group(function () {
    Route::apiResource('absences', AbsenceController::class);
    Route::apiResource('sanctions', SanctionController::class);
    Route::apiResource('mouvements', MouvementController::class);
    Route::apiResource('departures', DepartureController::class);
    Route::apiResource('appel-non-repondus', AppelNonReponduController::class);
    Route::apiResource('vehicules', VehiculeController::class);
    Route::apiResource('vehicule-rapports', VehiculeRapportController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('agent-service-histories', AgentServiceHistoryController::class);
    Route::apiResource('baremes_salariaux', BaremeSalariauxController::class);
    Route::apiResource('agent_baremes', AgentBaremeController::class);
    Route::apiResource('autorisations_types', AutorisationTypeController::class);
    Route::apiResource('agent_autorisations', AgentAutorisationController::class);
    // Agents list and show
    Route::get('agents', [\App\Http\Controllers\Api\AgentController::class, 'index']);
    Route::get('agents/{id}', [\App\Http\Controllers\Api\AgentController::class, 'show']);
});
