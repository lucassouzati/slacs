<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contestacao extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contestacaos';

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
    protected $fillable = ['data', 'status', 'observacao', 'resposta', 'licitacao_id', 'contrato_id', 'cidadao_id', 'colaborador_id', 'tipo'];

    public function licitacao()    
    {
        return $this->belongsTo('App\Licitacao');
    }

    public function contrato()    
    {
        return $this->belongsTo('App\Contrato');
    }    

    public function cidadao()    
    {
        return $this->belongsTo('App\Cidadao');
    }

    public function colaborador()    
    {
        return $this->belongsTo('App\Colaborador');
    }

    public function getDataAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    // public function setDataAttribute($value)
    // {   
    //     if(!is_array($value) && isset($value) && $value != '')
    //         $this->attributes['data'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    // }
}
