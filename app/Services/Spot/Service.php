<?php

namespace App\Services\Spot;

use App\Models\Spot;
use App\Models\User;

use App\Http\Requests\Spots\GDirectRequest;
use App\Http\Requests\Spots\GReverseRequest;
use Illuminate\Support\Facades\Log;

use App\Models\WeatherInfo;
use MStaack\LaravelPostgis\Geometries\Point;
use Illuminate\Support\Facades\Http;
use Response;

// use DB;

class Service
{
    public function index()
    {
        // $this->authorize('viewAny');
        $spots = Spot::all();
        // print_r($spots->toArray());
        return $spots;
    }

    public function paginate($page, $perpage = 5)
    {
        $spots = Spot::orderBy("created_at", "asc")->paginate($perpage);
        return $spots;
    }

    public function store()
    {

    }

    public function geocode_dir($query, $limit = 10)
    {
        $APP_ID = env("OWM_APIKEY");
        try {
            Log::info("getting coords for feature: [{$query}];");
            $response = Http::get("http://api.openweathermap.org/geo/1.0/direct?q={$query}&limit={$limit}&appid={$APP_ID}");
            $body = $response->body();

            if ($body == "[]")
                throw new \Exception("No feature had found", 1);
            else
                return $body;

        } catch (\Throwable $th) {
            //throw errors
            $datetime = date('Y-m-d H:i:s');
            $error = $th->getMessage();
            Log::error("[{$datetime}] ERR: Unable fetch coords for feature: [{$query}]: {$error}");

            return ["error" => $error];
        }
    }

    public function geocode_rev($lat, $lon, $limit = 10)
    {
        // $response = null;
        $APP_ID = env("OWM_APIKEY");
        try {
            \Log::info("getting names for coordinates: [{$lat}; {$lon}];");
            // $response = Http::get("https://nominatim.openstreetmap.org/search?q={$address}&format=json");    
            // return $APP_ID;
            $response = Http::get("http://api.openweathermap.org/geo/1.0/reverse?lat={$lat}&lon={$lon}&limit={$limit}&appid={$APP_ID}");
            // return $response->body();
            $body = $response->body();
            if ($body == "[]")
                throw new \Exception("No point had found", 1);
            else
                return $body;

        } catch (\Throwable $th) {
            //throw errors
            $datetime = date('Y-m-d H:i:s');
            $error = $th->getMessage();
            \Log::error("[{$datetime}] ERR: Unable fetch names for coordinates: [{$lat}; {$lon}]: {$error}");

            return ["error" => $error];
        }
    }


    public function single($id){
        $spot = Spot::find($id);
        $latestWeather = WeatherInfo::orderBy("created_at", "desc")
            ->where("spot_id", "=", $spot['id'])
            ->limit(7)->get();
        
        return [
            "spot" => $spot,
            "weather" => $latestWeather
        ];
    }
}
