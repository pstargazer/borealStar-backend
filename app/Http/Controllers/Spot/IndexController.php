<?php

namespace App\Http\Controllers\Spot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Model\Spot as Spot;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        // $validated = $request->validate();
        if (!$request) return $this->service->index();
        else {
            return $this->service->paginate(5);
        }
        // return $spots = Spot::all()->toArray();
    }
}
