<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FCMController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\SupervisionController;
use App\Http\Controllers\TalkieWalkieController;
use App\Models\AgentGroupPlanning;
use App\Models\Site;
use App\Models\Area;
use App\Models\AgentGroupAssignment;
use App\Models\Agent;
use App\Models\AgentGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(["cors"])->group(function(){
   
});


