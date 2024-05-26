<?php

namespace App\Http\Controllers\Forecast;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use \App\Models\WeatherInfo;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        return redirect('/api/forecasts/paginated?page=1&perpage=10');
    }
}
