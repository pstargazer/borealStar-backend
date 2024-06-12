<?php
 
namespace App\Services\Spot;
use App\Models\Spot;
use App\Models\User;

class Service 
{
    public function index() {
        // $this->authorize('viewAny');
        $spots = Spot::all();
        // print_r($spots->toArray());
        return $spots;
    }

    public function paginate($perpage) {
        $spots = Spot::paginate($perpage);
        return $spots;
    }

    public function store(){
        
    }
}
