<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'is_cnpj', 'cpfj', 'empresa_id', 'RG', 'telefone'];


    public function empresa(){
        return $this->belongsTo('App\Models\Empresa');
    }

}
