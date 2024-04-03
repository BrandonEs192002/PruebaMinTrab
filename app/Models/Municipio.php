<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    // Asumiendo que tienes una relación de muchos a uno con Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
