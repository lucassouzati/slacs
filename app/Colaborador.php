<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'colaboradores';

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
    protected $fillable = ['nome', 'cidade', 'email', 'password', 'aprovacao_cadastro', 'ativo', 'isAdmin'];

    
}
