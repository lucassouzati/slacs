<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Ente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'municipio', 'link_transparencia', 'link_licitacoes', 'link_contratos', 'esfera', 'classificacao', 'ativo'];

    public function importaEntes()
    {
        $client = new Client();
        $result = $client->request('GET', 'http://192.168.0.105:8001/entes');
        $entes = json_decode($result->getBody());

        foreach ($entes as $ente)
        {
            Ente::find($ente->id)->update(['classificacao' => $ente->classificacao]);
        }
    }    
}
