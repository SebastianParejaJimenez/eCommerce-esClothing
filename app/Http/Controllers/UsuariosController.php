<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    //

    public function index(Request $request){
    $usuario = User::with('rol')->withTrashed()->get();

    return view('pages/usuarios/usuarios', compact('usuario'));

    }

    public function search(Request $request)
    {
        $query = User::query()->withTrashed();

        if ($request->has('q')) {
            $query->where('name', 'like', '%' . $request->input('q') . '%');
        }
        $usuario = $query->paginate(5);

        return view('pages/usuarios/usuarios', compact('usuario'));
    }
    public function edit($id){

        $usuario = User::withTrashed()->findOrFail($id);


        return view('pages/usuarios/edit', compact('usuario'));

    }

    public function update(Request $request, $id){
        $usuario = User::withTrashed()->findOrFail($id);

        $request->validate([
            'email'=>'required|email|unique:users,email,'.$id,
            'name' => 'required',
            'rol_id' => 'required'
        ]);
        $usuario->name = $request->input('name');
        $usuario->rol_id= $request->input('rol_id');
        $usuario->email= $request->input('email');
        $usuario->save();

        return redirect()->route('usuarios');
    }


    public function updateUserCarrito(Request $request, $id){
        $usuario = User::withTrashed()->findOrFail($id);
        $request->validate([
            'name' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'numero_telefono' => 'required',
        ]);

        $usuario->name = $request->input('name');
        $usuario->ciudad = $request->input('ciudad');
        $usuario->pais = $request->input('pais');
        $usuario->direccion = $request->input('direccion');
        $usuario->codigo_postal = $request->input('codigo_postal');
        $usuario->numero_telefono = $request->input('numero_telefono');


        $usuario->save();

        return redirect()->back()->with('editado', true);
    }


    public function inactivos(Request $request){

        $usuarios_inactivos = User::withTrashed()->get();
        return view('pages/usuarios/inactivos', compact('usuarios_inactivos'));

    }

    public function destroy(Request $request, $id){

        $usuario = User::findOrFail($id);
        $usuario->estado = 'Inactivo';
        $usuario->save();
        $usuario->delete();
        return redirect()->back();

    }

    public function restore($id){
        $user = User::withTrashed()->find($id);
        $user->estado = 'Activo';
        $user->save();
        $user->restore();

        return redirect()->back();

    }

    public function restoreAll(){
        $users = User::onlyTrashed()->get();

        $users->each(function ($user) {
            $user->estado = 'Activo';
            $user->save();
            $user->restore();
        });

        return redirect()->back();

    }
    public function addUserNewsLetter(){
        $user = User::withTrashed()->findOrFail(auth()->user()->id);
        $user->newsletter = true;
        $user->save();

        return redirect()->back()->with('newsletterAdd', true);
    }

    public function deleteUserNewsLetter(){
        $user = User::withTrashed()->findOrFail(auth()->user()->id);
        $user->newsletter = false;
        $user->save();

        return redirect()->back()->with('newsletterAdd', true);
    }

}
