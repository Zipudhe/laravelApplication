<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vaga extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'requisitos' => 'array'
    ];
    protected $fillable = ["titulo", "empresa", "descricao", "localizacao", "requisitos"]; // campos que podem ser preenchidos pela request

    public function candidatos(): BelongsToMany {
        return $this->belongsToMany(Candidato::class, 'candidato_vaga', 'vaga_id', 'candidato_id')->withPivot('candidatou');
    }
}
