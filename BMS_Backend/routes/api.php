<?php
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/transactions',function(Request $request){
    return $request->transactions();
});

Route::get('transactions', [TransactionsController::class, 'index']); 
Route::match(['get', 'post'], 'addnew', [TransactionsController::class, 'store']);

Route::get('transactions/{id}', [TransactionsController::class, 'show']);
Route::put('transactionupdate/{id}', [TransactionsController::class, 'update']);
Route::delete('transactiondelete/{id}', [TransactionsController::class, 'destroy']); 

