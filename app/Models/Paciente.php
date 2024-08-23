<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'fecha_nacimiento',
        'sexo',
        'codigo',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

}
