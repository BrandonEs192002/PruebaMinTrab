<?php
namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Departamento;

class MunicipioController extends Controller
{
    public function index(Departamento $departamento)
    {
        $municipios = $departamento->municipios;
        return response()->json($municipios);
    }
}
