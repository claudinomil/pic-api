<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deficiencia extends Model
{
    use HasFactory;

    protected $table = 'deficiencias';

    protected $fillable = [
        'name',
        'descricao'
    ];
}
