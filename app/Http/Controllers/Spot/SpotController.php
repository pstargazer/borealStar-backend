<?php

namespace App\Http\Controllers\Spot;

// use App\Http\Controllers\Controller;
use App\Http\Requests\Spots\GDirectRequest;
use App\Http\Requests\Spots\GReverseRequest;

use App\Models\Spot;
use Illuminate\Http\Request;
use MStaack\LaravelPostgis\Geometries\Point;
use Illuminate\Support\Facades\Http;
use Response;

class SpotController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return $this->service->index();
        // $this->authorize('view');
        return $spots = Spot::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /* 
        get the JSON with coordinates center 
        from geocoder
        
        returns the unescaped JSON string
    */
    public function geocode_direct($query, $limit = 10)
    {
        // $response = null;
        $APP_ID = env("OWM_APIKEY");
        try {
            \Log::info("getting coords for feature: [{$query}];");
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
            \Log::error("[{$datetime}] ERR: Unable fetch coords for feature: [{$query}]: {$error}");

            return ["error", $error];
        }
    }

    /* 
        direct geocoding route
    */
    public function gDirect(GDirectRequest $request){
        return $this->service->geocode_dir($request->query, $request->limit);
    }

    /* 
        get the JSON with names and center coords 
        from geocoder
        
        returns the unescaped JSON string
    */
    public function geocode_reverse($lat, $lon, $limit = 10)
    {
        // $response = null;
        $APP_ID = env("OWM_APIKEY");
        try {
            \Log::info("getting names for coordinates: [{$lat}; {$lon}];");
            // $response = Http::get("https://nominatim.openstreetmap.org/search?q={$address}&format=json");    
            // return $APP_ID;
            $response = Http::get("http://api.openweathermap.org/geo/1.0/reverse?lat={$lat}&lon={$lon}&limit={$limit}&appid={$APP_ID}");
            $body = $response->body();
            // dd($body);
            if ($body == "[]")
                throw new \Exception("No point had found", 1);
            else
                return $body;

        } catch (\Throwable $th) {
            //throw errors
            $datetime = date('Y-m-d H:i:s');
            $error = $th->getMessage();
            \Log::error("[{$datetime}] ERR: Unable fetch names for coordinates: [{$lat}; {$lon}]: {$error}");

            return Response::json(["error", $error]);
        }
    }

    /* 
        reverse geocoding route
    */
    public function gReverse(GReverseRequest $request){
        return $this->service->geocode_rev($request->lat, $request->lon, $request->limit);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: validation
        // $this->authorize('create');
        $validated = $request;

        $names = json_decode(
            $this->geocode_reverse($validated->lattitude, $validated->longitude)
        );
        if ($names[0] === "error")
            return Response::json(array("message" => $names[1]));
        // return $names;
        $new_spot = Spot::create([
            "names" => json_encode($names, JSON_UNESCAPED_LINE_TERMINATORS),
            'coordinates' => new Point($validated->lattitude, $validated->longitude)
        ]);
        return $new_spot;
    }

    /**
     * Display the specified resource.
     */
    public function show(Spot $spot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spot $spot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spot $spot)
    {
        //
    }
}
