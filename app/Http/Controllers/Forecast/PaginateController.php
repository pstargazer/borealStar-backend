<?php

namespace App\Http\Controllers\Forecast;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WeatherInfo;

class PaginateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return response($request);
        
        $order = $request->order;
        if(!$request->order) $order = 'desc';
        if(empty($request->id)) {
            // $id = $request->id;
            return response([
                "message" => "invalid id"
            ]);
        }
        
        $paginated = WeatherInfo::where('spot_id', '=', $request->id)
        ->orderBy('id', $order)
        ->paginate(
            perPage: $request->perpage,
            page: $request->page
        )->toArray();
        return response($paginated);
    }
}
