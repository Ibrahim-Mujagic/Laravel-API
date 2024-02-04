<?php

use App\Http\Controllers\Api\ProjectsController;
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


Route::namespace('Api')
    ->prefix('projects')
    ->group(function(){
        Route::get('/',[ProjectsController::class,'index']);
        Route::get('/{slug}',[ProjectsController::class,'show']);
    });