<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;

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
    public function update(Request $request, string $id)
    {
        $candidato = Candidato::find($id);
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
    public function destroy(string $id)
    {
        $candidato = Candidato::find($id);
        return $candidato->delete();
    }
}
