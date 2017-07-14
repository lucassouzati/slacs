<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemContrato extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item_contratos';

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
    protected $fillable = ['item', 'exercicio', 'descricao', 'quantidade', 'unidade_medida', 'valor_unitario', 'valor_total', 'contrato_id'];

    public function contrato()
    {
        return $this->belongsTo('App\Contrato');
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
