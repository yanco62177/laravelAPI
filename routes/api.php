<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyListController;

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

Route::get('/my-list', [MyListController::class, 'index']);
Route::post('/my-list', [MyListController::class, 'store']);
Route::get('/done', [MyListController::class, 'getDoneItems']);
Route::get('/ongoing', [MyListController::class, 'getActiveItems']);
Route::get('/getPlaceholder/{id}', [MyListController::class, 'getPlaceholder']);

Route::delete('/my-list/{id}', [MyListController::class, 'destroy']);

Route::put('/updateTodo/{id}', [MyListController::class, 'update']);
Route::put('/updateStatus/{id}', [MyListController::class, 'updateStatus']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
