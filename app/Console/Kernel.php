<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        // 'App\Console\Commands\YourFirstCommand',
        'App\Console\Commands\FetchInfo'
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('wthr:suspend-inactive')
            // ->daily()
            // ->appendOutputTo(storage_path('logs/cities.log'));
        $schedule->command('wthr:fetch-info')
            ->hourly()
            ->appendOutputTo(storage_path('logs/weather.log'));
        // $schedule->command('wthr:fetch-alerts')
            // ->hourly()
            // ->appendOutputTo(storage_path('logs/alerts.log'));

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
