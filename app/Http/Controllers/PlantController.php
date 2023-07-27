<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PlantController extends Controller
{
    public function getAllPlants()
    {
        try {
            $plants = Plant::get();

            return response()->json([
                'message' => "All plants retrieved successfully",
                'data' => $plants
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving all plants' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving all plants'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantById($id)
    {
        try {

            $plant = Plant::where('id', $id)->get();

            return response()->json([
                'message' => "Plant retrieved successfully",
                'data' => $plant
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plant by id' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plant by id'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantByName(Request $request)
    {
        try {

            $name = $request->input('name');

            $plants = Plant::where('common_name', 'like', '%' . $name . '%')
                ->orWhere('scientific_name', 'like', '%' . $name . '%')
                ->get();

            return response()->json([
                'message' => "Plant retrieved successfully",
                'data' => $plants
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plant by name' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plant by name'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantBySunlight(Request $request)
    {
        try {

            $sunlight = $request->input('sunlight');

            $plants = Plant::where('sunlight', $sunlight)->get();

            return response()->json([
                'message' => "Plant retrieved successfully",
                'data' => $plants
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plant by sunlight' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plant by sunlight'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantByWatering(Request $request)
    {
        try {

            $watering = $request->input('watering');

            $plants = Plant::where('watering', $watering)->get();

            return response()->json([
                'message' => "Plant retrieved successfully",
                'data' => $plants
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plant by watering' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plant by watering'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantByFlowers(Request $request)
    {
        try {

            $flowers = $request->input('flowers');

            $plants = Plant::where('flowers', $flowers)->get();

            return response()->json([
                'message' => "Plants retrieved successfully",
                'data' => $plants
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plant if flowers' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plant if flowers'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantByPoisonous(Request $request)
    {
        try {

            $poisonous = $request->input('poisonous');

            $plants = Plant::where('poisonous_to_pets', $poisonous)->get();

            return response()->json([
                'message' => "Plants retrieved successfully",
                'data' => $plants
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plant if poisonous' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plant if poisonous'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createPlant(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'common_name' => 'required|string',
                'scientific_name' => 'required|string',
                'sunlight' => 'required|string',
                'watering' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            };

            $validData = $validator->validated();

            $plant = Plant::create([
                'common_name' => $validData['common_name'],
                'scientific_name' => $validData['scientific_name'],
                'sunlight' => $validData['sunlight'],
                'watering' => $validData['watering'],
            ]);

            return response()->json([
                'message' => "Plant created successfully",
                'data' => $plant
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error creating plant' . $th->getMessage());

            return response()->json([
                'message' => 'Error creating plant'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
