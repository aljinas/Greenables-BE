<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\FinancialYearController;

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

Route::group(['middleware' => ['cors', 'json.response']], function () {
  Route::post('/login', [EmployeeController::class, 'login']);
  Route::post('/registerEmployee', [EmployeeController::class, 'register']);
  Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here
    Route::get('getEmployees', [EmployeeController::class, 'getEmployees']);
    Route::resource('branch', BranchController::class);
    Route::resource('financialyear', FinancialYearController::class);
  });
});
