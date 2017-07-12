<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Licitacao extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'licitacoes';

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
    protected $fillable = ['unidade_gestora', 'num_proc', 'modalidade', 'tipo', 'situacao', 'data_julgamento', 'data_homologacao', 'objeto', 'valor', 'criterio', 'prazo_execucao', 'ente_id', 'tipo_cadastro', 'situacao_cadastro', 'colaborador_criou_id', 'colaborador_validou_id'];

    public function ente()
    {
        return $this->belongsTo('App\Ente');
    }

    public function colaborador_criou()
    {
        return $this->belongsTo('App\Colaborador', 'colaborador_criou_id');
    }

    public function colaborador_validou()
    {
        return $this->belongsTo('App\Colaborador', 'colaborador_validou_id');
    }

    public function getDataJulgamentoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDataJulgamentoAttribute($value)
    {   
        $this->attributes['data_julgamento'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    public function getDataHomologacaoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDataHomologacaoAttribute($value)
    {   
        $this->attributes['data_homologacao'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    public function setValorAttribute($value)
    {
        if(str_contains($value, 'R$')){
            $resultado = str_replace(["R$ ", "."], "", $value);
            $resultado = str_replace([",", ], ".", $resultado);
        }
        else{
            $resultado = str_replace([",", ], ".", $value);
            $this->attributes['valor'] = $resultado;
        }
        
    }

    public function getValorAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    
}
