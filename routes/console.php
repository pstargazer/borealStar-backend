<?php

use App\Models\WeatherInfo;

// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Schedule;

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use \App\Models\Spot;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Artisan::command('')

// Schedule::job('')


// prune expired user tokens 
// Artisan::call('sanctum:prune-expired --hours=24')->daily();

// Schedule::command('sanctum:prune-expired --hours=24')->daily();