<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fechaNacimiento' => 'required|date',
            'primerNombre' => 'required',
            'segundoNombre' => 'required',
            'primerApellido' => 'required',
            'segundoApellido' => 'required',
            'estadoCivil' => 'required',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'confirmarEmail' => 'required|same:email',
            'direccion' => 'required',
            'departamento' => 'required',
            'municipio' => 'required',
            'archivoPDF' => 'required|mimes:pdf|max:1024',
        ]);

        // Guardar el archivo PDF
        $archivoPDF = $request->file('archivoPDF')->store('archivoPDF');

        // Crear una nueva instancia de Persona
        $persona = new Persona();
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->primerNombre = $request->primerNombre;
        $persona->segundoNombre = $request->segundoNombre;
        $persona->primerApellido = $request->primerApellido;
        $persona->segundoApellido = $request->segundoApellido;
        $persona->estadoCivil = $request->estadoCivil;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        $persona->confirmarEmail = $request->confirmarEmail;
        $persona->direccion = $request->direccion;
        $persona->departamento = $request->departamento;
        $persona->municipio = $request->municipio;
        $persona->archivoPDF = $archivoPDF;
        $persona->save();
    }

    public function index()
    {
        $personas = Persona::all();
        return response()->json($personas);
    }

    public function show($id)
    {
        // Depuración: Imprime el ID recibido para verificar si es correcto
        
        
        // Buscar la persona por su ID
        $persona = Persona::find($id);
        
        // Verificar si la persona existe
        if (!$persona) {
            return response()->json(['message' => 'Persona no encontrada'], 404);
        }
        
        // Devolver la persona encontrada
        return response()->json($persona);
    }
}
