<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferramenta extends Model
{
    use HasFactory;

    protected $table = 'ferramentas';

    protected $fillable = [
        'name',
        'descricao',
        'url',
        'icon',
        'viewing_order',
        'user_id'
    ];
}
