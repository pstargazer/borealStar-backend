<?php

namespace App\Http\Controllers\Spot;

use App\Http\Controllers\Spot\BaseController;
use Illuminate\Http\Request;

class SingleController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $data =  $this->service->single($id);
        return $data;
    }
}
