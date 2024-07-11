<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyListController;
use App\Http\Controllers\UserListsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


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


// start of test endpoints
Route::get('/my-list', [MyListController::class, 'index']);
Route::post('/my-list', [MyListController::class, 'store']);
Route::get('/done', [MyListController::class, 'getDoneItems']);
Route::get('/ongoing', [MyListController::class, 'getActiveItems']);
Route::get('/getPlaceholder/{id}', [MyListController::class, 'getPlaceholder']);

Route::delete('/my-list/{id}', [MyListController::class, 'destroy']);

Route::put('/updateTodo/{id}', [MyListController::class, 'update']);
Route::put('/updateStatus/{id}', [MyListController::class, 'updateStatus']);

Route::get('/allUsers', [UserListsController::class, 'allUsers']);

Route::get('/findByUser/{userID}', [MyListController::class, 'findByUser']);
Route::post('/loginTest', [UserListsController::class, 'login']);
Route::post('/signup', [UserListsController::class, 'signup']);
// end of test endpoints


// default laravel authentication for users

Route::post('/register', [RegisterController::class, 'register']);

// Login Route
Route::post('/login', [LoginController::class, 'login']);

// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
