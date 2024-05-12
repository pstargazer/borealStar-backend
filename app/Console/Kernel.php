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
        // $schedule->command('inspire')->hourly();
        $schedule->command('wthr:fetch-info')
            ->hourly()
            // ->everyTenSeconds()
            ->appendOutputTo('/storage/logs/weather.log');
        // $schedule->command('wthr:fetch-info')->hourly()->timezone(env('APP_TIMEZONE'));

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
