<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquiagem extends Model
{
    protected $fillable =[
        'nome', 'marca', 'categoria',
        'cor', 'preco', 'descricao', 'imagem'
    ];
}
