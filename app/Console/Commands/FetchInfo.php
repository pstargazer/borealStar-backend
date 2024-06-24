<?php

namespace App\Console\Commands;

use App\Models\Spot;
use App\Models\WeatherInfo;
use Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;

class FetchInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wthr:fetch-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store wthr data ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Log::useFiles();
        $apikey = env('OWM_APIKEY');
        $spots = Spot::all()->toArray();
        foreach ($spots as $spot) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$spot['coordinates']->getLat()}&lon={$spot['coordinates']->getLng()}&appid={$apikey}");
            // $spot->coordinates
            $resp = json_decode($response->body());
            
            // Log::debug($resp->cod . "\n");
            if ($resp->cod == 200) {
                WeatherInfo::create([
                    'response' => $response->body(),
                    'spot_id' => $spot['id'],
                    'weather_source_id' => 1
                ]);
                $msg = sprintf("Successfully fetched data in {$resp->name}\n");
            } else {
                $resp = json_decode($response->body());
                $name = json_decode($spot['names'], true)[0]['name'] ;
                WeatherInfo::create([
                    'response' => $response->body(),
                    'spot_id' => $spot['id'],
                    'weather_source_id' => 1
                ]);
                $msg = sprintf("Unable to fetch data in {$name}, code {$resp->cod}\n");
            }
            print($msg);
            Log::info($msg);
        }
    }
}
