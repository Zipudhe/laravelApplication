<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


use App\Models\Vaga;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidato extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'habilidades' => 'array'
    ];
    protected $fillable = ["nome", "email", "senha", "habilidades", "data_nascimento"]; // campos que podem ser preenchidos pela request

    public function vagas(): BelongsToMany {
        return $this->belongsToMany(Vaga::class, 'candidato_vaga', 'candidato_id', 'vaga_id')->withPivot('candidatou');
    }

    public function cadidatado(): BelongsToMany {
        return $this->vagas()->wherePivot('candidatou', true);
    }

    public static function matches(string $candidatoId) {
        $vagas = DB::table('candidatos')
            ->join('vagas', function($join) {
                $join->whereRaw('JSON_OVERLAPS(candidatos.habilidades, vagas.requisitos)');
            })
            ->get();

        return $vagas;
    }
}
