<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Candidato;
use App\Models\Vaga;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidato_vaga', function (Blueprint $table) {
            $table->id();
            $table->uuid('candidato_id');
            $table->uuid('vaga_id');

            $table->foreign('candidato_id')->references('uuid')->on('candidatos')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('vaga_id')->references('uuid')->on('vagas')->onDelete('cascade')->onUpdate('no action');
            $table->boolean("candidatou")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidato_vaga');
    }
};
