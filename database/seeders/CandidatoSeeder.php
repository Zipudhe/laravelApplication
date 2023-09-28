<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('candidato')->insert([
            'uuid' => Str::uuid()->toString(),
            'nome' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'senha' => Hash::make('password'),
            'data_nascimento' => '1990-01-01',
            'habilidades' => json_encode(array("PHP", "Laravel", "MySQL")),
        ]);
    }
}
