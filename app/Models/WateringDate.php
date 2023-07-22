<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WateringDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'my_plant_id',
        'watered_on',
        'next_date_water'
    ];

    public function myPlants()
    {
        return $this->belongsTo(MyPlant::class);
    }
}
