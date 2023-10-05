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

        $ordenes_recientes = Orden::with('user')
            ->orderBy('created_at', 'desc')
            ->whereDay('created_at', Carbon::now()->day)
            ->limit('5')
            ->paginate('5');

        $total_ventas = Orden::sum('total');

        $ventas = Orden::all();

        $data = [];
        foreach ($ventas as $venta) {
            $data['label'][] = $venta->created_at->format('F');
            $data['data'][] = $venta->total;
        }

        $data['data'] = json_encode($data);

        $rol = Auth::user()->rol_id;
        if ($rol == 1) {
                return view('pages/dashboard/dashboard', $data, compact('total_ventas', 'productosConVentas', 'ordenes_recientes'));
        }
        return redirect()->route('tienda');
    }
}
