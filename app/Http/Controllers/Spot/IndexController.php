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
        return $this->service->index();
        // return $spots = Spot::all()->toArray();
    }
}
