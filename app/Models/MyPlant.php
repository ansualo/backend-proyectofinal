<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPlant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plant_id',
        'name',
        'days_between_water',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function watering_date()
    {
        return $this->belongsTo(WateringDate::class);
    }
}
