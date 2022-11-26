<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\contrat;
use App\Models\Etales;
use App\Models\Emplacement;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {
            $empla = Emplacement::all();
            $contrats = contrat::with('emplacements')->get();
                foreach($contrats as $contrat){
                    $emplacement = $contrat->emplacements->first();
                    if(NULL!==$emplacement){
                        $contrat->increment('som_toto', $emplacement->loyer);
                        DB::table('loyers')->where('contrat_id', $contrat->id)->update(['somme_restant'=>$contrat->som_toto]);

                    }
                }
            $etales = Etales::all();
            foreach($etales as $etale){
                DB::table('etales')->update(['pass'=>$etale->pass+100, 'statut'=>0]);
            }

        })->everyMinute();



    }
    //DB::table('emplacements')->where('id', request('emplacements_id'))->update(['statut'=>1]);
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
