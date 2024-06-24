<?php

namespace App\Http\Controllers\Spot;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Spot\BaseController;
use App\Models\Spot;
use App\Models\WeatherInfo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (true) {
            // if unauthorized, return random
            $spots = Spot::inRandomOrder()
                ->limit(5)->get();
    

            // $weatherRecs = WeatherInfo::whereBelongsTo($spot);

        } else {
            // if authorized
        }

        // get last 7 weather records 
        $randomSpots = $spots->map(function ($spot) {
            $latestWeather = WeatherInfo::orderBy("created_at", "desc")
                ->where("spot_id", "=", $spot['id'])
                ->limit(7)->get();

            return [
                "spot" => $spot,
                "weather" => $latestWeather
            ];
        });

        return $randomSpots;

    }
}
