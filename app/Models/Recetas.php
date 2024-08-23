<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    protected $fillable = [
        'idMedicina',
        'idCita',
        'cantidad',
        'nota',
    ];

    public function medicinas()
    {
        return $this->belongsTo(Medicinas::class, 'idMedicina');
    }

    public function cita()
    {
        return $this->belongsTo(Citas::class, 'idCita');
    }
}
