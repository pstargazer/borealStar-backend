<?php

namespace App\Http\Controllers\Spot;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as IlluminateController;

use \App\Services\Spot\Service;

class BaseController extends IlluminateController
{
    use AuthorizesRequests, ValidatesRequests;

    public $service;
    function __construct(Service $service) {
        $this->service = $service;
    }
}
