<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherInfo extends Model
{
    use HasFactory;
    public $fillable = [
        'weather_source_id',
        'spot_id',
        'response'
    ];

}
