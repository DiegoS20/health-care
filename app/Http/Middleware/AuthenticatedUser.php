<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedUser
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verifica si el doctor ha iniciado sesión o si el usuario es un paciente autenticado
        if (session()->has('doctor_logged_in') || Auth::check()) {
            return $next($request);
        }

        // Si no hay ninguna sesión activa, redirige al login
        return redirect('/login/paciente')->withErrors(['auth' => 'Debe iniciar sesión para acceder a esta página.']);
    }
}
