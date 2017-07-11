<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    
}
