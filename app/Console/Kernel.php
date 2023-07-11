<?php

namespace App\Console;

use App\Models\Advertisement;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
{
//     $schedule->call(function () {
//         // Delete ads where the expiration date is earlier than the current date and time
//         Advertisement::where('expires_at', '<', now())->delete();
//     })->daily(); // Run the job daily
// }



$schedule->call(function () {
    DB::table('advertisements')
        ->where('expires_at', '<', now())
        ->delete();
})->daily();











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
