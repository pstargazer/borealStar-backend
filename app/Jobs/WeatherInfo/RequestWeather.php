<?php

namespace App\Jobs\WeatherInfo;

use App\Models\Spot;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RequestWeather implements ShouldQueue 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Spot $spot,
        public User $requester = null
    )
    {
        if (!$requester) $requester_id = 0; // mark request as iniiated by system
        else $this->requester_id = $requester->id;

        $this->spot = $spot;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
