<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/';

    protected function rules()
    {
        return [
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    protected function validationErrorMessages()
    {
        return [
            'password.min'       => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'El correo electrónico no es válido.',
        ];
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect($this->redirectTo)
            ->with('success', 'Tu contraseña ha sido restablecida correctamente.');
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return back()->with('error', match($response) {
            Password::INVALID_TOKEN => 'El enlace de restablecimiento no es válido o ha expirado.',
            Password::INVALID_USER  => 'No existe ninguna cuenta con ese correo electrónico.',
            default                 => 'Ha ocurrido un error, inténtalo de nuevo.',
        });
    }
}
