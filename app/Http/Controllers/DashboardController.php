<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use App\Models\DataFeed;
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
            $dataFeed = new DataFeed();
            $productosConVentas = Producto::withCount('ordenProductos')->orderBy('orden_productos_count', 'desc')->take(5)->get();

            $ordenes_recientes = Orden::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

            $total_ventas = Orden::sum('subtotal');

            $ventas = Orden::all();

            $data = [];
            foreach ($ventas as $venta) {
                $data['label'][] = $venta->created_at->format('F');
                $data['data'][] = $venta->subtotal;
            }

            $data['data'] = json_encode($data);


            $rol = Auth::user()->rol_id;
            if ($rol == 1) {
            return view('pages/dashboard/dashboard', $data, compact('dataFeed' , 'total_ventas' , 'productosConVentas', 'ordenes_recientes'));
            }
            return redirect()->route('tienda');


        }
    }
