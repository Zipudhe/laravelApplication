<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Candidato extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'habilidades' => 'array'
    ];
    protected $fillable = ["nome", "email", "senha", "habilidades", "data_nascimento"]; // campos que podem ser preenchidos pela request
}
