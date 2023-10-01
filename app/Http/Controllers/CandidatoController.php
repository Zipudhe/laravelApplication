<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Vaga;
use App\Models\CandidatoVaga;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Candidato::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $requestContent = json_decode($request->getContent());
        if($requestContent == null) {
            return response()->json([
                'message' => 'Invalid JSON',
                'JSON' => $request->getContent()
            ], 400);
        }

        $candidato = new Candidato();
        foreach($requestContent as $key => $value) {
            $candidato->$key = $value;
        }

        $candidato->save();
        return $candidato;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Candidato::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $IdCandidato)
    {
        $candidato = Candidato::find($IdCandidato);
        $requestContent = json_decode($request->getContent());
        if($requestContent == null) {
            return response()->json([
                'message' => 'Invalid JSON',
                'JSON' => $request->getContent()
            ], 400);
        }
        foreach($requestContent as $key => $value) {
            $candidato->$key = $value;
        }

        $candidato->save();
        return $candidato;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $IdCandidato)
    {
        $candidato = Candidato::find($IdCandidato);
        return $candidato->delete();
    }

    public function match(string $IdCandidato) {
        // find candidato with habilidades matching vaga requisitos
        return Candidato::matches($IdCandidato);
    }

    public function candidato(string $id) {

    }

    public function candidatar(Request $request) {
        $requestContent = json_decode($request->getContent());

        if($requestContent == null) {
            return response()->json([
                'message' => 'Invalid JSON',
                'JSON' => $request->getContent()
            ], 400);
        }
        if(!$requestContent->candidatoId) {
            return response()->json([
                'message' => 'Candidato não informado'
            ], 400);
        }

        if(!$requestContent->vagaId) {
            return response()->json([
                'message' => 'Vaga não informada'
            ], 400);
        }

        var_dump($requestContent);

        $candidato = Candidato::find($requestContent->candidatoId);
        $vaga = Vaga::find($requestContent->vagaId);

        if(!$candidato) {
            return response()->json([
                'message' => 'Candidato não encontrado'
            ], 404);
        }

        if(!$vaga) {
            return response()->json([
                'message' => 'Vaga não encontrada'
            ], 404);
        }


        CandidatoVaga::create([
            'candidato_id' => $requestContent->candidatoId,
            'vaga_id' => $requestContent->vagaId
        ]);
    }
}
