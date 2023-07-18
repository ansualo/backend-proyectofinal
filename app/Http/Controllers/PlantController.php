<?php

namespace App\Http\Controllers;

use App\Models\Plant;
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
                'message'=> "All plants retrieved successfully",
                'data'=> $plants
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error retrieving all plants' . $th->getMessage());

            return response()->json([
                'message'=> 'Error retrieving all plants'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantById($id)
    {
        try {

            $plant = Plant::where('id', $id)->get();

            return response()->json([
                'message'=> "Plant retrieved successfully",
                'data'=> $plant
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error retrieving plant by id' . $th->getMessage());

            return response()->json([
                'message'=> 'Error retrieving plant by id'
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
                'message'=> "Plant retrieved successfully",
                'data'=> $plants
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            Log::error('Error retrieving plant by name' . $th->getMessage());

            return response()->json([
                'message'=> 'Error retrieving plant by name'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
