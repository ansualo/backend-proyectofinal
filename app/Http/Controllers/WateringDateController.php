<?php

namespace App\Http\Controllers;

use App\Models\MyPlant;
use App\Models\WateringDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class WateringDateController extends Controller
{
    public function getWateringDate($id)
    {
        try {

            $wateringDate = WateringDate::where('my_plant_id', $id)->get();

            return response()->json([
                'message' => "Watering date retrieved successfully",
                'data' => $wateringDate
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving watering date' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving watering date'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createWateringDate(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'my_plant_id' => 'required|integer',
                'watered_on' => 'required|date'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            };

            $validData = $validator->validated();

            //calculate next_date_water
            $my_plant = MyPlant::where('id', $validData['my_plant_id'])->first();
            $days_between_water = $my_plant->days_between_water;
            $carbonStartDate = Carbon::parse($validData['watered_on']);
            $next_date_water = $carbonStartDate->addDays($days_between_water);

            // calculate days_to_water
            $today = Carbon::now()->format('Y-m-d');
            $today_parse = Carbon::parse($today);
            $days_to_water = $today_parse->diffInDays($next_date_water);

            $watering_date = WateringDate::create([
                'my_plant_id' => $validData['my_plant_id'],
                'watered_on' => $validData['watered_on'],
                'next_date_water' => $next_date_water,
                'days_to_water' => $days_to_water
            ]);

            return response()->json([
                'message' => "Watering date has been created successfully",
                'data' => $watering_date
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error creating watering date' . $th->getMessage());

            return response()->json([
                'message' => 'Error creating watering date'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateWateringDate(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id'=>'required',
                'watered_on' => 'required|date'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            };

            $validData = $validator->validated();

            $watering_date = WateringDate::find(($validData['id']));

            if(!$watering_date){
                return response()->json([
                    'message' => 'Watering date cannot be found'
                ], Response::HTTP_OK);
            }

            if(isset($validData['watered_on'])){
                $watering_date->watered_on = $validData['watered_on'];
            }

            //calculate next_date_water
            $my_plant_id = $watering_date->my_plant_id;
            $days_between_water = MyPlant::where('id', $my_plant_id)->first()->days_between_water;
            $carbonStartDate = Carbon::parse($validData['watered_on']);
            $next_date_water = $carbonStartDate->addDays($days_between_water);

            // calculate days_to_water
            $today = Carbon::now()->format('Y-m-d');
            $today_parse = Carbon::parse($today);
            $days_to_water = $today_parse->diffInDays($next_date_water);
            
            $watering_date->next_date_water = $next_date_water;
            $watering_date->days_to_water = $days_to_water;

            $watering_date->save();

            return response()->json([
                'message' => "Watering date has been updated successfully",
                'data' => $watering_date
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error updating watering date' . $th->getMessage());

            return response()->json([
                'message' => 'Error updating watering date'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
