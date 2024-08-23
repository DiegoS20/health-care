<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $fillable = [
        'idPaciente',
        'fecha',
        'notas',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];


    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idPaciente');
    }
}
