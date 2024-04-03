<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario en la base de datos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Iniciar sesión al usuario recién registrado
        Auth::login($user);

        // Obtener el rol del usuario (puedes cambiar esto según cómo almacenes los roles)
        $userRole = $user->role;

        return response()->json(['message' => 'Usuario registrado exitosamente', 'user' => $user, 'userRole' => $userRole]);
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autenticación exitosa
            $user = Auth::user();

            // Obtener el rol del usuario (puedes cambiar esto según cómo almacenes los roles)
            $userRole = $user->role;

            return response()->json(['message' => 'Inicio de sesión exitoso', 'user' => $user, 'userRole' => $userRole]);
        } else {
            // Autenticación fallida
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    }
}
