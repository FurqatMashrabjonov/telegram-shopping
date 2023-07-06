<?php

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


Route::prefix('webhook')->group(__DIR__ . '/webhooks/index.php');

Route::post('/sms/callback', function (Request $request){
    \Illuminate\Support\Facades\Log::info('sms', $request->all());
    return response()->json(['status' => 'ok'])->status(200);
});
