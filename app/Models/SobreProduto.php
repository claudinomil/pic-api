<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SobreProduto extends Model
{
    use HasFactory;

    protected $table = 'sobre_produto';

    protected $fillable = [
        'descricao'
    ];
}
