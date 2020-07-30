<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilPermissao extends Model
{
    protected $fillable = ['permissao_id','perfil_id'];
}
