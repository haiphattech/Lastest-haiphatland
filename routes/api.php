<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\RecruitController;
use App\Http\Controllers\Api\ContactController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/home/{lang?}', [ApiController::class, 'getDataHome']);
Route::get('/footer/{lang?}', [ApiController::class, 'getDataFooter']);
Route::get('/{category?}/{slug?}', [ApiController::class, 'index']);
Route::get('/{lang?}/{category?}/{slug?}', [ApiController::class, 'indexLang']);
Route::post('/ung-tuyen', [RecruitController::class, 'store']);
Route::post('/contact', [ContactController::class, 'store']);
