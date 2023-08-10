<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFeed;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $dataFeed = new DataFeed();
        $productos = Producto::paginate(5);

        $rol = Auth::user()->rol_id;
        if ($rol == 1) {
        return view('pages/productos/productos', compact('dataFeed', 'productos'));
        }
        return redirect()->route('tienda');

    }

    public function create(Request $request){
        $dataFeed = new DataFeed();
        $rol = Auth::user()->rol_id;

        if ($rol == 1) {
        return view('pages/productos/create', compact('dataFeed'));
        }
        return redirect()->route('tienda');

    }
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1',
            'cantidad' => 'required|numeric|min:1',
            'categoria' => 'required',
            'imagen' => 'required|image|mimes:jpg,png,gif',
        ]);
        $user_creador = Auth::user()->id;

        $producto = new Producto();

        $producto->nombre = $request->input('nombre');
        $producto->slug = Str::slug($request->input('nombre'));
        $producto->precio = $request->input('precio');
        $producto->cantidad = $request->input('cantidad');
        $producto->categoria = $request->input('categoria');
        $producto->created_by = $user_creador;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaGuardarImagen = "productos_subidos/";
            $imgGuardado = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imgGuardado);

            $producto['imagen'] = $imgGuardado;

        }

        $producto->save();
        return redirect()->route('productos');

    }

    public function show($id){
        $dataFeed = new DataFeed();
        $producto = Producto::findOrFail($id);

        return view('pages.productos.show', compact('dataFeed', 'producto'));

    }

    public function sumar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->cantidad += 1;
        $producto->save();

        return redirect()->route('productos');
    }

    public function restar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->cantidad > 0) {
            $producto->cantidad -= 1;
            $producto->save();
        }

        return redirect()->route('productos');
    }

    public function destroy($id){

        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos');

    }

    public function edit($id){
        $dataFeed = new DataFeed();
        $producto = Producto::findOrFail($id);
        $rol = Auth::user()->rol_id;

        if ($rol == 1) {

            return view('pages/productos/edit', compact('dataFeed', 'producto'));

    }

        return redirect()->route('tienda');

    }


    public function update(Request $request, $id){

        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1',
            'cantidad' => 'required|numeric|min:1',
            'categoria' => 'required',
            'imagen' => 'image|mimes:jpg,png,gif',
        ]);

        $user_edit = Auth::user()->id;
        $imagenAnterior = $producto->imagen;

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->cantidad = $request->input('cantidad');
        $producto->categoria = $request->input('categoria');
        $producto->updated_by = $user_edit;

        if ($request->hasFile('imagen')) {

            if ($imagenAnterior) {
                Storage::delete('productos_subidos/' . $imagenAnterior);
            }

            $request->validate([
                'imagen' => 'image|mimes:jpg,png,gif',
            ]);
            $imagen = $request->file('imagen');
            $rutaGuardarImagen = "productos_subidos/";
            $imgGuardado = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imgGuardado);

            $producto['imagen'] = $imgGuardado;
        }

        $producto->save();

        return redirect()->route('productos');

    }
}
