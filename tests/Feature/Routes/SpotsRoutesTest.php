<?php

namespace Tests\Feature\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \app\Models\Spot;

class SpotsRoutesTest extends TestCase
{
    private $prefix = "/api/spots";
    /**
     * A basic feature test example.
     */
    public function test_spots_index(): void
    {
        $response = $this->get($this->prefix . '/');

        $response->assertStatus(200, "spots index page unavailable");
    }

    public function test_single_spot(){
        // $id = Spot::find();
        $id = 5;
        $response = $this->get($this->prefix . "/{$id}");

        $response->assertStatus(200, "single spot page unavailable");
    }
}
