<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('run:scheduled-route')->dailyAt('11:10'); // Runs at 11:10 AM
        // $schedule->command('horoscope:generate daily')->dailyAt('10:55'); // Runs at 1:00 AM
        // $schedule->command('horoscope:generate weekly')->dailyAt('10:57'); // Runs at 1:30 AM
        // $schedule->command('horoscope:generate yearly')->dailyAt('10:59'); // Runs at 2:00 AM
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
