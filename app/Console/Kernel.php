<?php

namespace App\Console;

use App\Models\Planning;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        // $schedule->call(function () {
        //     DB::table('annonce')->delete();
        // })->daily();


        $schedule->call(function () {

            for($i = 1; $i <= 2; $i++){
                for($t = 1; $t <= 3; $t++){

                    $date = Carbon::today()->addDays(7);
                    
                    $date = Carbon::parse($date)->format('Y-m-d');

                    $hour = Planning::find($i);

                Reservation::create([

                'name' => "Association X",
                'tel' => "+212 522358266",
                'email' => "ass@gmail.com",
                'dateReservation' =>$date,
                'heureDepart'=> $hour->heureDepart,
                'heureFin'=> $hour->heureFin,
                'idTerrain' => $t,
                'planningId' => $i.$t.$date,

            ]);}}

        })->days([Schedule::SUNDAY, Schedule::WEDNESDAY]);


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
