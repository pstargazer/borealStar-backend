<?php

namespace App\Http\Controllers\Spot;

// use App\Http\Controllers\Controller;
use App\Models\Spot;
use Illuminate\Http\Request;
use MStaack\LaravelPostgis\Geometries\Point;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: validation
        $this->authorize('create');
        $validated = $request;
        $new_spot = Spot::create([
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
