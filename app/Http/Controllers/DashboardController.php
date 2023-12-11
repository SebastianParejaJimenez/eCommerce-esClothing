<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Orden;
use App\Models\User;

class DashboardController extends Controller
{

    /**
     * Displays the dashboard screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $productosConVentas = Producto::withCount('ordenProductos')->orderBy('orden_productos_count', 'desc')->take(5)->get();

        $inicioSemana = Carbon::now()->startOfWeek(); // Obtener el inicio de la semana
        $finSemana = Carbon::now()->endOfWeek(); // Obtener el fin de la semana

        $ordenes_recientes = Orden::with('user')
        ->where('estado', '!=', 'CANCELADO')
        ->where('estado', '!=', 'PENDIENTE')
        ->orderBy('created_at', 'desc')
        ->whereDay('created_at', Carbon::now()->day)
        ->paginate('4');

        $total_ventas = Orden::whereDay('created_at', Carbon::now()->day)
        ->where('estado', '!=', 'CANCELADO')
        ->where('estado', '!=', 'PENDIENTE')
        ->get()
        ->sum('total');

        $cantidad_productos = Producto::count();

        $total_productos = Orden::whereDay('created_at', Carbon::now()->day)
        ->where('estado', '!=', 'CANCELADO')
        ->where('estado', '!=', 'PENDIENTE')
        ->get()
        ->sum('total');

        $total_ventas_semana = Orden::whereBetween('created_at', [$inicioSemana, $finSemana])
        ->where('estado', '!=', 'CANCELADO')
        ->where('estado', '!=', 'PENDIENTE')
        ->get()
        ->sum('total');

        $ordenes_semana = Orden::where('estado', '!=', 'CANCELADO')
        ->where('estado', '!=', 'PENDIENTE')
        ->whereBetween('created_at', [$inicioSemana, $finSemana])
        ->count();

        $ventas = Orden::whereDay('created_at', Carbon::now()->day)
        ->where('estado', '!=', 'CANCELADO')
        ->where('estado', '!=', 'PENDIENTE')
        ->get();

        $data = [];
        foreach ($ventas as $venta) {
            $data['label'][] = $venta->created_at->format('F');
            $data['data'][] = $venta->total;
        }

        $data['data'] = json_encode($data);
        $rol = Auth::user()->rol_id;
        if ($rol == 1) {
                return view('pages/dashboard/dashboard', $data, compact('total_ventas', 'productosConVentas', 'ordenes_recientes', 'total_ventas_semana', 'ordenes_semana', 'cantidad_productos'));
        }
        return redirect()->route('tienda');
    }
}
