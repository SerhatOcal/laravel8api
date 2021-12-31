<?php

use App\Http\Controllers\v1\Api\CheckSubscriptionController;
use App\Http\Controllers\v1\Api\DeviceController;
use App\Http\Controllers\v1\Api\PurchaseController;
use Illuminate\Support\Facades\Route;

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
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});*/


Route::middleware('client-token')->group(function (){
	Route::apiResources([
		'purchase' => PurchaseController::class,
		'check/subscription' => CheckSubscriptionController::class,
	],['only' => ['store']]);
});

Route::apiResource('/device', DeviceController::class);

