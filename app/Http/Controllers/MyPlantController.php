<?php

namespace App\Http\Controllers;

use App\Models\MyPlant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class MyPlantController extends Controller
{
    public function getMyPlantsByUser()
    {
        try {

            $user_id = auth()->user()->id;

            $myplants = MyPlant::where('user_id', $user_id)
                ->with([
                    'plant:id,common_name,scientific_name,sunlight,watering',
                    'watering_date:id,my_plant_id,watered_on,next_date_water,days_to_water'
                ])->get();

            if ($myplants->isEmpty()) {
                return response()->json([
                    'message' => "You don't have any plants yet",
                ], Response::HTTP_OK);
            }

            return response()->json([
                'message' => "MyPlants by user retrieved successfully",
                'data' => $myplants
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving my plants by user' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving my plants by user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getMyPlantById($id)
    {
        try {

            //we check the plant belongs to the user
            $user_id_token = auth()->user()->id;
            $user_id = MyPlant::where('id', $id)->first(['user_id'])->user_id;

            if ($user_id_token !== $user_id) {
                return response()->json([
                    'message' => 'Incorrect plant'
                ], Response::HTTP_OK);
            }

            $myplant = MyPlant::where('id', $id)->with([
                'plant:id,common_name,scientific_name,sunlight,watering',
                'watering_date:id,my_plant_id,watered_on,next_date_water,days_to_water'
            ])->first();
            

            return response()->json([
                'message' => "My plant retrieved successfully",
                'data' => $myplant
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving my plant by id' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving my plant by id'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getMyPlantByPlantId($plant_id)
    {
        try {

            $user_id = auth()->user()->id;

            $myplant = MyPlant::where('user_id', $user_id)
                  ->where('plant_id', $plant_id)
                  ->with([
                    'plant:id,common_name,scientific_name,sunlight,watering',
                    'watering_date:id,my_plant_id,watered_on,next_date_water,days_to_water'
                ])->first();

            if(!$myplant){
                return response()->json([
                    'message' => "Incorrect plant",
                ], Response::HTTP_OK);
            }
         
            return response()->json([
                'message' => "My plant retrieved successfully",
                'data' => $myplant
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving my plant by plant_id' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving my plant by plant_id'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantsWaterToday()
    {
        try {

            $user_id = auth()->user()->id;
            $today = Carbon::now()->format('Y-m-d');

            $myplants = MyPlant::where('user_id', $user_id)->with([
                'plant:id,common_name,scientific_name,sunlight,watering'
            ])->get();

            $plants_water_today = $myplants->filter(function ($myplant) use ($today) {
                $next_date_water = $myplant->watering_date[0]['next_date_water'];
                return $next_date_water === $today;
            });

            return response()->json([
                'message' => "Plants that need water today retrieved successfully",
                'data' => $plants_water_today->values()
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plants that need water today' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plants that need water today'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPlantsNotWaterToday()
    {
        try {

            $user_id = auth()->user()->id;
            $today = Carbon::now()->format('Y-m-d');

            $myplants = MyPlant::where('user_id', $user_id)->with([
                'plant:id,common_name,scientific_name,sunlight,watering'
            ])->get();

            $plants_not_water_today = $myplants->filter(function ($myplant) use ($today) {
                $next_date_water = $myplant->watering_date[0]['next_date_water'];
                return $next_date_water !== $today;
            });

            return response()->json([
                'message' => "Plants that do not need water today retrieved successfully",
                'data' => $plants_not_water_today->values()
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving plants that do not need water today' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving plants that do not need water today'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createMyPlant(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'days_between_water' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            };

            $validData = $validator->validated();

            $user_id = auth()->user()->id;

            $myPlant = MyPlant::create([
                'user_id' => $user_id,
                'plant_id' => $id,
                'name' => $validData['name'],
                'days_between_water' => $validData['days_between_water'],
            ]);

            return response()->json([
                'message' => "My plant has been created successfully",
                'data' => $myPlant
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error creating my plant' . $th->getMessage());

            return response()->json([
                'message' => 'Error creating my plant'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateMyPlant(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'string',
                'days_between_water' => 'integer'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            };

            $validData = $validator->validated();

            $myPlant = MyPlant::find($id);

            //we check the plant belongs to the user
            $user_id_token = auth()->user()->id;
            $user_id = MyPlant::where('id', $id)->first(['user_id'])->user_id;

            if ($user_id_token !== $user_id) {
                return response()->json([
                    'message' => 'Incorrect plant'
                ], Response::HTTP_OK);
            }

            // we make the changes
            if (isset($validData['name'])) {
                $myPlant->name = $validData['name'];
            }

            if (isset($validData['days_between_water'])) {
                $myPlant->days_between_water = $validData['days_between_water'];
            }

            $myPlant->save();

            return response()->json([
                'message' => "My plant has been updated successfully",
                'data' => $myPlant
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error updating my plant' . $th->getMessage());

            return response()->json([
                'message' => 'Error updating my plant'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteMyPlant($id)
    {
        try {

            //we check the plant belongs to the user
            $user_id_token = auth()->user()->id;
            $user_id = MyPlant::where('id', $id)->first(['user_id'])->user_id;

            if ($user_id_token !== $user_id) {
                return response()->json([
                    'message' => 'Incorrect plant'
                ], Response::HTTP_OK);
            }

            MyPlant::destroy($id);

            return response()->json([
                'message' => 'My plant deleted succesfully',
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deleting my plant' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting my plant'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
