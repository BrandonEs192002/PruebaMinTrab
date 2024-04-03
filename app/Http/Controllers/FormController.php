<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class FormController extends Controller
{
    public function accept($id)
    {
        // Lógica para aceptar el formulario
        $persona = Persona::find($id);
        if ($persona) {
            $persona->status = 'aceptado'; // Cambia el estado a aceptado
            $persona->save();
            return response()->json(['message' => 'Formulario aceptado'], 200);
        } else {
            return response()->json(['message' => 'Formulario no encontrado'], 404);
        }
    }

    public function reject($id)
    {
        // Lógica para rechazar el formulario
        $persona = Persona::find($id);
        if ($persona) {
            $persona->status = 'denegado'; // Cambia el estado a rechazado
            $persona->save();
            return response()->json(['message' => 'Formulario rechazado'], 200);
        } else {
            return response()->json(['message' => 'Formulario no encontrado'], 404);
        }
    }
}
