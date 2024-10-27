<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
    ];

    public function fornecedores()
    {
        return $this->belongsToMany(Fornecedor::class, 'fornecedor_produto');
    }
}
