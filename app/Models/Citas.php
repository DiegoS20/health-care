<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $primaryKey = 'idCita';
    protected $fillable = [
        'idPaciente',
        'fecha',
        'notas',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idPaciente');
    }

    public function recetas()
    {
        return $this->hasMany(Recetas::class, 'idCita', 'idCita');
    }
}
