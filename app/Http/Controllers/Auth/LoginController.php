<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard'; // Personaliza la redirección después del inicio de sesión

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Personaliza la vista de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Personaliza el nombre del campo de inicio de sesión (por ejemplo, utiliza "username" en lugar de "email")
    public function username()
    {
        return 'email';
    }

    // Personaliza el método para cerrar sesión
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('tienda'); // Cambia 'home' por el nombre de la ruta que deseas usar
    }
}
