<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoDeAcesso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'historico_de_acesso';

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
    protected $fillable = ['licitacoes', 'contratos', 'transparencia', 'data_hora', 'ente_id'];

    public function ente()
    {
    	return $this->belongsTo('App\Ente');
    }

    public function importar()
    {
        $client = new Client();
        $result = $client->request('GET', 'http://192.168.0.105:8001/historicos_de_acesso');
    	$historicos_de_acesso = json_decode($result->getBody());
        foreach ($historicos_de_acesso as $historico_de_acesso)
        {
        	HistoricoDeAcesso::updateOrCreate([
        		'id' => $historico_de_acesso->id,
        		'licitacoes' => $historico_de_acesso->licitacoes,
        		'contratos' => $historico_de_acesso->contratos,
        		'transparencia' => $historico_de_acesso->portal_transparencia,
        		'data_hora' => $historico_de_acesso->data_hora,
        		'ente_id' => $historico_de_acesso->ente_id,
			]);
        }
    }
}
