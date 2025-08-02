<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Centro;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
        protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if (session()->has('centro_id')) {
            return redirect()->route('temas');
        }

        return redirect('/')->with('success', __('Sesión iniciada correctamente'));
    }

    public function validarCentro(Request $request)
    {
        $request->validate([
            'codigoCentro' => 'required|exists:centros,id',
            'codigo' => 'required',
        ]);

        $centro = Centro::find($request->codigoCentro);

        if ($centro && $centro->codigo === $request->codigo) {
            session(['centro_id' => $centro->id]);
            return redirect()->route('temas');
        } else {
            return redirect()->back()->withInput()->with('error', __('eskutik.codigo_centro_incorrecto'));
        }
    }

    public function logoutCentro(Request $request)
{
    // Elimina la sesión del centro
    $request->session()->forget('centro_id');

    // Opcional: puedes destruir toda la sesión si lo deseas
    // $request->session()->invalidate();

    return redirect('/')->with('success', __('eskutik.sesionCentroC'));
}

/**
 * Si las credenciales no son válidas, se llama a este método.
 */
protected function sendFailedLoginResponse(Request $request)
{
    $message = __('eskutik.usuario_datos_incorrectos');

    // En vez de withErrors(), usamos with('error', ...)
    return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->with('error', $message);
}



}
