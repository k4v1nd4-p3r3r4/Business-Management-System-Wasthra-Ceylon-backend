<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RawmaterialsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/employee',EmployeeController::class);

Route::apiResource('/leave',LeaveController::class);

Route::apiResource('/task',TaskController::class);


//routes for rawmaterials
Route::get('rawmaterials', [RawmaterialsController::class,'index']);
Route::post('rawmaterials', [RawmaterialsController::class,'store']);
Route::get('rawmaterials/{id}', [RawmaterialsController::class,'show']);
Route::get('rawmaterials/{id}/edit', [RawmaterialsController::class,'edit']);
Route::put('rawmaterials/{id}/edit', [RawmaterialsController::class,'update']);
Route::delete('rawmaterials/{id}/delete', [RawmaterialsController::class,'destroy']);