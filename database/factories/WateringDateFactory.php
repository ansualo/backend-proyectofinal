<?php

namespace Database\Factories;

use App\Models\MyPlant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WateringDate>
 */
class WateringDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $myPlantId = 0; 
        $myPlantId++;

        $today = Carbon::now()->format('Y-m-d');
        $today_parse = Carbon::parse($today);
        $days_to_water = MyPlant::where('id', $myPlantId)->first()->days_between_water;
        $next_date_water = $today_parse->addDays($days_to_water);

        // //calculate next_date_water
        // $my_plant = MyPlant::where('id', $validData['my_plant_id'])->first();
        // $days_between_water = $my_plant->days_between_water;
        // $carbonStartDate = Carbon::parse($validData['watered_on']);
        // $next_date_water = $carbonStartDate->addDays($days_between_water);

        // // calculate days_to_water
        // $today = Carbon::now()->format('Y-m-d');
        // $today_parse = Carbon::parse($today);
        // $days_to_water = $today_parse->diffInDays($next_date_water);

        return [
            'my_plant_id' => $myPlantId,
            'watered_on' => $today,
            'next_date_water' => $next_date_water,
            'days_to_water' => $days_to_water
        ];
    }
}
