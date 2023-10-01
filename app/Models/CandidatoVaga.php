<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatoVaga extends Model
{
    use HasFactory;

    protected $table = 'candidato_vaga';
    protected $fillable = ['candidato_id', 'vaga_id', 'candidatou'];
    public $timestamps = false;
}
