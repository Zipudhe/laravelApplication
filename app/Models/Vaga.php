<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Vaga extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'requisitos' => 'array'
    ];
    protected $fillable = ["titulo", "empresa", "descricao", "localizacao", "requisitos"]; // campos que podem ser preenchidos pela request
}
