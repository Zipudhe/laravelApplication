<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vaga', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('titulo', 50);
            $table->string('empresa', 100);
            $table->string('descricao', 255);
            $table->string('localizacao', 100)->nullable()->default('remoto'); // assume que uma vaga sem localização é uma vaga remota
            $table->json('requisitos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaga');
    }
};
