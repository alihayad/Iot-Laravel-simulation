<?php

namespace App\Console;

use App\Console\Commands\FillModuleData;
use App\Console\Commands\FillModuleLogs;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [

        FillModuleData::class,
        FillModuleLogs::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('module:fill-data')->everyMinute(); //every minute add new data
        $schedule->command('module:fill-logs')->everyFiveMinutes(); //every 5 minutes simulate module failure
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}