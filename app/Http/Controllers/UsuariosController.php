<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    //

    public function index(Request $request){
    $rol = 1;
    if ($request->usuario == 'cliente') {
        $rol = 2;
    }
    $usuario = User::where('rol_id', $rol)->with('rol')->get();

    return view('pages/usuarios/usuarios', compact('usuario'));

    }

    public function edit($id){

        $usuario = User::findOrFail($id);


        return view('pages/usuarios/edit', compact('usuario'));

    }

    public function update(Request $request, $id){
        $usuario = User::findOrFail($id);

        $request->validate([
            'email'=>'required|email|unique:users,email,'.$id,
            'name' => 'required',
            'rol_id' => 'required'
        ]);
        $usuario->name = $request->input('name');
        $usuario->rol_id= $request->input('rol_id');
        $usuario->email= $request->input('email');
        $usuario->save();

    }
}
