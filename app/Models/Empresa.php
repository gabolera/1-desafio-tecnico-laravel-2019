<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome', 'CNPJ' , 'UF'];

    protected $table = 'empresas';
}
