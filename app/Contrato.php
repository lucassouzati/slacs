<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contrato extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contratos';

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
    protected $fillable = ['unidade_gestora', 'data_emissao', 'instrumento_contrato', 'numero_contrato', 'data_expiracao', 'tipo', 'fornecedor', 'cnpj_cpf', 'teve_aditivo', 'processo', 'valor', 'descricao', 'ente_id', 'colaborador_criou_id', 'colaborador_validou_id', 'licitacao_id', 'numero_licitacao', 'tipo_cadastro'];

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

    public function itensContrato()
    {
        return $this->hasMany('App\ItemContrato');
    }

    public function getDataEmissaoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDataEmissaoAttribute($value)
    {   
        if(!is_array($value) && isset($value) && $value != '')
            $this->attributes['data_emissao'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    public function getDataExpiracaoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDataExpiracaoAttribute($value)
    {   
        if(!is_array($value) && isset($value) && $value != '')
            $this->attributes['data_expiracao'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    public function setValorAttribute($value)
    {

        if(str_contains($value, 'R$')){
            $resultado = str_replace(["R$ ", "."], "", $value);
            $resultado = str_replace([",", ], ".", $resultado);
            $this->attributes['valor'] = $resultado;
        }
        else if ($value == '')
            $this->attributes['valor'] = null;
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
