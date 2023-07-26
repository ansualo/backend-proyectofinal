<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyPlantController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WateringDateController;
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

// AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// USERS
Route::get('/allusers', [UserController::class, 'getAllUsers'])->middleware('auth:sanctum', 'isAdmin');
Route::get('/allusers/deleted', [UserController::class, 'getDeletedUsers'])->middleware('auth:sanctum', 'isAdmin');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');
Route::put('/profile', [UserController::class, 'updateProfile'])->middleware('auth:sanctum');
Route::delete('/profile', [UserController::class, 'deleteProfile'])->middleware('auth:sanctum');
Route::delete('/profile/{id}', [UserController::class, 'deleteProfileAsAdmin'])->middleware('auth:sanctum', 'isAdmin');
Route::put('/profile/{id}', [UserController::class, 'restoreProfile'])->middleware('auth:sanctum', 'isAdmin');

// PLANTS
Route::get('/plants', [PlantController::class, 'getAllPlants']);
Route::get('/plants/{id}', [PlantController::class, 'getPlantById']);
Route::post('/plants/name', [PlantController::class, 'getPlantByName']);
Route::post('/plants/sunlight', [PlantController::class, 'getPlantBySunlight']);
Route::post('/plants/watering', [PlantController::class, 'getPlantByWatering']);
Route::post('/plants', [PlantController::class, 'createPlant'])->middleware('auth:sanctum', 'isAdmin');

// MYPLANTS
Route::get('/myplants', [MyPlantController::class, 'getMyPlantsByUser'])->middleware('auth:sanctum');
Route::get('/myplants/watertoday', [MyPlantController::class, 'getPlantsWaterToday'])->middleware('auth:sanctum');
Route::get('/myplants/notwatertoday', [MyPlantController::class, 'getPlantsNotWaterToday'])->middleware('auth:sanctum');
Route::get('/myplants/{id}', [MyPlantController::class, 'getMyPlantById'])->middleware('auth:sanctum');
Route::get('/myplants/plant/{plant_id}', [MyPlantController::class, 'getMyPlantByPlantId'])->middleware('auth:sanctum');
Route::post('/myplants/{id}', [MyPlantController::class, 'createMyPlant'])->middleware('auth:sanctum');
Route::put('/myplants/{id}', [MyPlantController::class, 'updateMyPlant'])->middleware('auth:sanctum');
Route::delete('/myplants/{id}', [MyPlantController::class, 'deleteMyPlant'])->middleware('auth:sanctum');

// WATERING
Route::get('/water/{id}', [WateringDateController::class, 'getWateringDate'])->middleware('auth:sanctum');
Route::post('/water', [WateringDateController::class, 'createWateringDate'])->middleware('auth:sanctum');
Route::put('/water', [WateringDateController::class, 'updateWateringDate'])->middleware('auth:sanctum');
Route::delete('/water/{id}', [WateringDateController::class, 'deleteWateringDate'])->middleware('auth:sanctum');


