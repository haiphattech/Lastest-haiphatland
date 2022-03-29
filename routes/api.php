<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;

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
Route::get('/home/{lang?}', [HomeController::class, 'getDataHome']);
Route::get('/footer/{lang?}', [HomeController::class, 'getDataFooter']);
Route::get('/{category?}/{slug?}', [HomeController::class, 'index']);
Route::get('/{lang?}/{category?}/{slug?}', [HomeController::class, 'indexLang']);
