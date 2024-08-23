<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showDoctorLoginForm()
    {
        return view('auth.login-doctor');
    }

    public function showPacienteLoginForm()
    {
        return view('auth.login-user');
    }

    public function loginAsDoctor(Request $request)
    {
        $doctorEmail = env('DOCTOR_EMAIL');
        $doctorPassword = env('DOCTOR_PASSWORD');

        if (
            $request->input('email') === $doctorEmail &&
            Hash::check($request->input('password'), $doctorPassword)
        ) {

            session(['doctor_logged_in' => true]);

            return redirect()->route('dashboard-index');
        }

        return redirect()->back()->withErrors(['credentials' => 'Credenciales incorrectas para el doctor.']);
    }

    public function loginAsPaciente(Request $request)
    {
        $codigo = $request->input('email');

        $paciente = Paciente::where('codigo', $codigo)->first();

        if ($paciente) {
            session(['cliente_logged_id' => $paciente->idPaciente]);

            return redirect()->route('index-cliente');
        }

        return redirect()->back()->withErrors(['codigo' => 'Código de paciente no válido.']);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('doctor_logged_in');
        session()->forget('cliente_logged_id');
        return to_route('login-doctor');
    }
}
