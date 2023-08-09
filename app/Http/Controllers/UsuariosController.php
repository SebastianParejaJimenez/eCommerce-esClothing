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
    $usuario = User::where('rol_id', $rol)->get();

    return view('pages/usuarios/usuarios', compact('usuario'));

    }
}
