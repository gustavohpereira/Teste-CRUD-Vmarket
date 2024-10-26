<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
     protected $table = "fornecedores";
     protected $fillable = ["nome","email","cnpj","categoria","uf","telefone"];

}
