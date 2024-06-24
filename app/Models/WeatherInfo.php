<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherInfo extends Model
{
    use HasFactory;

    public function toArray(){
        return [
            'id' => $this->id,
            'weather_source_id' => $this->weather_source_id,
            'spot_id' => $this->spot_id,
            'response' => $this->response,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }

    public $fillable = [
        'weather_source_id',
        'spot_id',
        'response'
    ];

}
