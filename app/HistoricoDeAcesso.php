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
}
