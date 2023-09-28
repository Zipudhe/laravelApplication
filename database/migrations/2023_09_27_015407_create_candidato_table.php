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
        /**
         * Modelo para criação da tabela de 'candidato' no banco de dados
         */
        Schema::create('candidato', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string("nome");
            $table->string("email");
            $table->string('senha', 100);
            $table->json('habilidades')->nullable();
            $table->date('data_nascimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidato');
    }
};
