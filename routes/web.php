<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ModuleLogController;
use App\Http\Controllers\ModulesDataController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ModuleController::class, 'index']);
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
Route::get('/modules', [ModuleController::class, 'getModuleData'])->name('modules.data.datatable');
Route::get('module/{module:serial_number}', [ModuleController::class, 'show'])->name('module.show');
Route::get('/modules/{id}/dashboard/data', [ModulesDataController::class, 'dashboardData'])->name('module.data.dashboard');
Route::get('/check-for-module-down', [ModuleLogController::class, 'checkForModuleDown']);
Route::put('/notified-for-module-down', [ModuleLogController::class, 'Notified']);
Route::get('/all/logs', [ModuleLogController::class, 'index'])->name('module.logs');
Route::get('/logs/data', [ModuleLogController::class, 'getModuleLogs'])->name('logs.data.datatable');