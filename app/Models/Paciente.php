<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $primaryKey = "idPaciente";
    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'fecha_nacimiento',
        'sexo',
        'codigo',
    ];

    public function citas()
    {
        return $this->hasMany(Citas::class, 'idCita');
    }
}
