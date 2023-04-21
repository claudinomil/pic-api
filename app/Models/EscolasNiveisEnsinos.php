<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscolasNiveisEnsinos extends Model
{
    use HasFactory;

    protected $table = 'escolas_niveis_ensinos';

    protected $fillable = [
        'escola_id',
        'nivel_ensino_id'
    ];
}
