<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Ente;
use App\HistoricoDeAcesso;
use GuzzleHttp\Client;

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
        $configuracao = DB::table('configuracao')->first();

        if($configuracao->frequencia == 'Diária')
        {
            $schedule->call(function (){
                Ente::importar();
                HistoricoDeAcesso::importar();
            })->dailyAt($configuracao->horario);    
        }
        else
        {
            $schedule->call(function (){
                Ente::importar();
                HistoricoDeAcesso::importar();
            })->weekly()->fridays()->at($configuracao->horario);    
        }
        
    }

    // public function importaEntes()
    // {
    //     $client = new Client();
    //     $result = $client->request('GET', 'http://192.168.0.105:8001/entes');
    //     $entes = json_decode($result->getBody());

    //     foreach ($entes as $ente)
    //     {
    //         Ente::find($ente->id)->update(['classificacao' => $ente->classificacao]);
    //     }
    // }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
