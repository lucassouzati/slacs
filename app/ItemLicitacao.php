<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemLicitacao extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item_licitacaos';

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
    protected $fillable = ['item', 'descricao', 'quantidade', 'unidade_medida', 'valor_unitario', 'valor_proposta_vencedora', 'valor_total', 'licitacao_id', 'tipo_pessoa', 'cnpj_cpf'];

    
    public function licitacao()    
    {
        return $this->belongsTo('App\Licitacao');
    }

    public function setValorUnitarioAttribute($value)
    {
        if(str_contains($value, 'R$')){
            $resultado = str_replace(["R$ ", "."], "", $value);
            $resultado = str_replace([",", ], ".", $resultado);
        }
        else{
            $resultado = str_replace([",", ], ".", $value);
            
        }
        $this->attributes['valor_unitario'] = $resultado;
        
    }

    public function getValorUnitarioAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setValorPropostaVencedoraAttribute($value)
    {
        if(str_contains($value, 'R$')){
            $resultado = str_replace(["R$ ", "."], "", $value);
            $resultado = str_replace([",", ], ".", $resultado);
        }
        else{
            $resultado = str_replace([",", ], ".", $value);
            
        }
        $this->attributes['valor_proposta_vencedora'] = $resultado;
        
    }

    public function getValorPropostaVencedoraAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setValorTotalAttribute($value)
    {
        if(str_contains($value, 'R$')){
            $resultado = str_replace(["R$ ", "."], "", $value);
            $resultado = str_replace([",", ], ".", $resultado);
        }
        else{
            $resultado = str_replace([",", ], ".", $value);
            
        }
        $this->attributes['valor_total'] = $resultado;
        
    }

    public function getValorTotalAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
