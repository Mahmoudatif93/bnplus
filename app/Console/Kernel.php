<?php

namespace App\Console;

use Carbon\Carbon;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DailyOrder::class,
        Commands\NationalCampany::class,
        Commands\swaggercards::class,
       Commands\orders::class,
       Commands\endedpackages::class,
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
      

        $schedule->command('order:daily')
        ->everyMinute();
       $schedule->command('campany:national')
        ->daily();	

        $schedule->command('swagger:cards')->everySixHours();
        
         $schedule->command('endedpackages:daily')
        ->everyMinute();
        
      //->everySixHours();		
       /*  $schedule->command('finalorder:daily')
        ->everyTenMinutes();*/
        
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
