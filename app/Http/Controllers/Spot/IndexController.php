<?php

namespace App\Http\Controllers\Spot;

use App\Http\Controllers\Controller;
use App\Models\Spot;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return response($request);
        
        $order = $request->order;
        if(!$request->order) $order = 'asc';

        
        $paginated = Spot::orderBy('id', $order)
        ->paginate(
            perPage: $request->perpage,
            page: $request->page
        )->toArray();
        return response($paginated);
    }
}
