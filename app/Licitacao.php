<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['unidade_gestora', 'num_proc', 'modalidade', 'tipo', 'situacao', 'data_julgamento', 'data_homologacao', 'objeto', 'valor', 'criterio', 'prazo_execucao', 'ente_id', 'tipo_cadastro', 'situacao_cadastro', 'user_criou_id', 'user_validou_id'];

    
}
