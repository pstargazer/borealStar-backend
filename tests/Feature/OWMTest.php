<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

use \App\Services\Spot\Service as SpotService;


class OWMTest extends TestCase
{
    /**
     * test that env contains OWM api key
     */
    public function test_api_key_set(): void
    {
        $this->assertIsString(env('OWM_APIKEY'), "OWM key is not set");
    }

    public function test_owm_available() : void {
        $response = Http::get('https://openweathermap.org');
        $this->assertTrue($response->successful(), "OWM unavailable");
    }

    
    /**
     *
     */
    public function test_geocoding_direct(): void
    {
        $service = new SpotService;
        // dump($service->geocode_dir("москва",10));
        $this->assertObjectHasProperty('error', (object)$service->geocode_dir("xalvexgbmao",10));
    }

    /**
     *
     */
    public function test_geocoding_direct_error(): void
    {
        $service = new SpotService;
        $this->assertObjectHasProperty('error', (object)$service->geocode_dir("xalvexgbmao",10));
    }

    /**
     * 
     */
    public function test_geocoding_reverse(): void
    {
        $this->assertTrue(true);
    }
}
