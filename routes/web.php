<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupervisionController;
use App\Http\Controllers\UserController;
use App\Models\SitePlanningConfig;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PresenceController;
use App\Models\Agent;
use App\Models\Announce;
use Spatie\Permission\Models\Permission;
use App\Models\Secteur;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

 Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    //Emettre sur un canal de talkie walkie
 Route::post('/table.delete', [AdminController::class, 'triggerDelete'])->name('table.delete');

 Route::get('/notifications.push', [SupervisionController::class, 'getNotifications'])->name("notifications.push");

Auth::routes();

// API endpoints for horaires and groupes
Route::middleware(['auth'])->group(function () {

      // Page web pour la gestion des services (affiche la vue resources/views/services.blade.php)
   Route::get('/services', function () {
      return view('services');
   })->name('services.index')->middleware("can:services.view");

   // Barèmes
   Route::get('/baremes', function () {
      return view('baremes');
   })->name('baremes.index')->middleware("can:baremes.view");

   // Agents page
   Route::get('/agents', function () {
      return view('agents');
   })->name('agents.index')->middleware("can:agents.view");

   // Liste des agents
   Route::get('/liste_agents', function () {
      return view('agents_list');
   })->name('agents.list')->middleware("can:agents.view");

   // Agent info save API
   Route::post('/api/agents/info', [App\Http\Controllers\AgentController::class, 'saveInfo']);
   Route::post('/api/agents/photo', [App\Http\Controllers\AgentController::class, 'uploadPhoto']);

   // Page d'affectation barème
   Route::get('/agent-bareme', function () {
      return view('agent_bareme');
   })->name('agent.bareme')->middleware("can:baremes.view");

   // Paramètres -> Formules (autorisations / congés)
   Route::get('/parametres/formules', function () {
      return view('parametres.formules');
   })->name('parametres.formules')->middleware("paie_parametres.view");

   // Congés page (assign congés to agents)
   Route::get('/conges', function () {
      return view('conges');
   })->name('conges.index')->middleware("conges.view");

   // Autorisations spéciales page (reuse conges view in autorisation mode)
   Route::get('/autorisations', function () {
      return view('conges', ['mode' => 'autorisation']);
   })->name('autorisations.index')->middleware("autorisations.view");

   // Horaires - pages et API
   Route::get('/horaires', function () {
      return view('horaires');
   })->name('horaires.index')->middleware("autorisations.view");;

   Route::get('/groupes', function () {
      return view('groupes');
   })->name('groupes.index')->middleware("groupes.view");;

   // Sites page (list and creation)
   Route::get('/sites', function () {
      return view('sites');
   })->name('sites.list')->middleware("sites.view");;

   // Some menus link to /sites.list, keep a route for compatibility
   Route::get('/sites.list', function () {
      return view('sites');
   })->middleware("sites.view");;

   Route::view("/roles", "role_permissions")->name("roles")->middleware("can:roles.view");
   Route::view("/users", "users")->name("users")->middleware("can:users.view");

   //=============================User permissions manage route begin=====================================//
   Route::get("/actions", [UserController::class, "getActions"])->name("actions");
   Route::post("/role/create", [UserController::class, "createOrUpdateRole"])->name("role.create")->middleware("can:roles.create");
   Route::get("/roles/all", [UserController::class, "getAllRoles"])->name("roles.all")->middleware("can:roles.view");
   Route::post("/user/create", [UserController::class, "createOrUpdateUser"])->name("user.create")->middleware("can:users.create");
   Route::get("/users/all", [UserController::class, "getAllUsers"])->name("users.all")->middleware("can:users.view");
   Route::post("/user/access", [UserController::class, "attributeAccess"])->name("user.create")->middleware("can:users.update");


   Route::get('/api/horaires', [App\Http\Controllers\PresenceController::class, 'getAllHoraires']);
   Route::post('/api/horaires', [App\Http\Controllers\PresenceController::class, 'createHoraire']);

   Route::get('/api/groupes', [App\Http\Controllers\PresenceController::class, 'getAllGroups']);
   Route::post('/api/groupes', [App\Http\Controllers\PresenceController::class, 'createGroup']);
   // API to assign congés to multiple agents
   Route::post('/api/conges/assign', [App\Http\Controllers\CongesController::class, 'assign']);

   // Sites API
   Route::get('/api/sites', [App\Http\Controllers\ConfigController::class, 'viewAllPaginateSites']);
   Route::post('/api/sites', [App\Http\Controllers\ConfigController::class, 'createSite']);
   // Sectors API (used by sites page)
   Route::get('/api/sectors', [App\Http\Controllers\ConfigController::class, 'viewAllPaginateSectors']);
   Route::post('/api/sectors', [App\Http\Controllers\ConfigController::class, 'createSector']);

   // Separations
   Route::get('/separations', function(){ return view('separations'); })->name('separations.index');
   Route::get('/api/separations', [App\Http\Controllers\AgentSeparationController::class, 'index']);
   Route::post('/api/separations', [App\Http\Controllers\AgentSeparationController::class, 'store']);
   Route::put('/api/separations/{id}/status', [App\Http\Controllers\AgentSeparationController::class, 'updateStatus']);

   // Sanctions
   Route::get('/sanctions', function(){ return view('sanctions'); })->name('sanctions.index');
   Route::get('/api/sanctions', [App\Http\Controllers\SanctionController::class, 'index']);
   Route::post('/api/sanctions', [App\Http\Controllers\SanctionController::class, 'store']);
   Route::put('/api/sanctions/{id}/status', [App\Http\Controllers\SanctionController::class, 'updateStatus']);
   // Mouvements page
   Route::get('/mouvements', function () { return view('mouvements'); })->name('mouvements.index');
   Route::post('/api/mouvements', [App\Http\Controllers\MouvementController::class, 'store']);

   // Affectations
   Route::get('/affectations', function () { return view('affectations'); })->name('affectations.index');
   Route::post('/api/affectations', [App\Http\Controllers\AffectationController::class, 'store']);

   // Vehicules
   Route::get('/vehicules', [App\Http\Controllers\VehiculeController::class, 'index']);
   Route::post('/api/vehicules', [App\Http\Controllers\VehiculeController::class, 'store']);
   Route::get('/api/vehicules', [App\Http\Controllers\VehiculeController::class, 'listAll']);

   // Vehicule rapports
   Route::get('/vehicule-rapports', [App\Http\Controllers\VehiculeRapportController::class, 'index']);
   Route::post('/api/vehicule-rapports', [App\Http\Controllers\VehiculeRapportController::class, 'store']);
   Route::get('/api/vehicule-rapports', [App\Http\Controllers\VehiculeRapportController::class, 'listRecent']);

   // Appels non répondu
   Route::get('/appels-non-repondu', [App\Http\Controllers\AppelNonReponduController::class, 'index'])->name('appels.non.repondu');
   Route::post('/api/appels-non-repondu', [App\Http\Controllers\AppelNonReponduController::class, 'store']);
   Route::get('/api/agents-by-site/{site?}', [App\Http\Controllers\AppelNonReponduController::class, 'agentsBySite']);

   // Absences
   Route::get('/absences', [App\Http\Controllers\AbsenceWebController::class, 'index']);
   Route::post('/api/absences-bulk', [App\Http\Controllers\AbsenceWebController::class, 'storeBulk']);
   Route::get('/api/absences', [App\Http\Controllers\AbsenceWebController::class, 'listRecent']);
   Route::get('/api/agents-by-site-absences/{site?}', [App\Http\Controllers\AbsenceWebController::class, 'agentsBySite']);

   // Retards
   Route::get('/retards', [App\Http\Controllers\RetardWebController::class, 'index']);
   Route::post('/api/retards-bulk', [App\Http\Controllers\RetardWebController::class, 'storeBulk']);
   Route::get('/api/retards', [App\Http\Controllers\RetardWebController::class, 'listRecent']);
   Route::get('/api/agents-by-site-retards/{site?}', [App\Http\Controllers\RetardWebController::class, 'agentsBySite']);
});
