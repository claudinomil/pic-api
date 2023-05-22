<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nee extends Model
{
    use HasFactory;

    protected $table = 'nees';

    protected $fillable = [
        'name',
        'descricao'
    ];
}
