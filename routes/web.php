<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupervisionController;
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

Auth::routes();

Route::middleware(['geo.restricted','auth'])->group(function () {

    // Tableau de bord
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    //Emettre sur un canal de talkie walkie
    Route::post('/table.delete', [AdminController::class, 'triggerDelete'])->name('table.delete');

    Route::get('/notifications.push', [SupervisionController::class, 'getNotifications'])->name("notifications.push");
});
