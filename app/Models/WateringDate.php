<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WateringDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'watered_on'
    ];

    public function myPlants()
    {
        return $this->hasMany(MyPlant::class);
    }
}
