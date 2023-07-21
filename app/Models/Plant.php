<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'common_name',
        'scientific_name',
        'sunlight',
        'watering',
    ];

    public function myPlants()
    {
        return $this->hasMany(MyPlant::class);
    }
}
