<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Candidato;

class RegisterController extends Controller
{
    //
    public function create() {
        return view('register');
    }

    public function store(Request $request) {

        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'confirmar_senha' => ['required', 'same:senha'],
        ]);




        // $requestContent = json_decode($request->getContent());
        $request['senha'] = bcrypt($request['senha']);



        $candidato['nome'] = $request['nome'];
        $candidato['email'] = $request['email'];
        $candidato['senha'] = $request['senha'];
        $candidato['habilidades'] = explode(',', $request['habilidades']);

        Candidato::create($candidato);

        return redirect()->to('/');
    }
}
