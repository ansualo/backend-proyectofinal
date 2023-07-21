<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyPlantController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\UserController;
use App\Models\User;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');
Route::put('/profile', [UserController::class, 'updateProfile'])->middleware('auth:sanctum');
Route::delete('/profile', [UserController::class, 'deleteProfile'])->middleware('auth:sanctum');
Route::post('/profile/{id}', [UserController::class, 'restoreProfile'])->middleware('auth:sanctum', 'isAdmin');


Route::get('/plants', [PlantController::class, 'getAllPlants']);
Route::get('/plants/{id}', [PlantController::class, 'getPlantById']);
Route::post('/plants/name', [PlantController::class, 'getPlantByName']);
Route::post('/plants/sunlight', [PlantController::class, 'getPlantBySunlight']);
Route::post('/plants/watering', [PlantController::class, 'getPlantByWatering']);



Route::get('/myplants', [MyPlantController::class, 'getMyPlantsByUser'])->middleware('auth:sanctum');
Route::post('/myplants/{id}', [MyPlantController::class, 'createMyPlant'])->middleware('auth:sanctum');
Route::put('/myplants/{id}', [MyPlantController::class, 'updateMyPlant'])->middleware('auth:sanctum');
Route::delete('/myplants/{id}', [MyPlantController::class, 'deleteMyPlant'])->middleware('auth:sanctum');

