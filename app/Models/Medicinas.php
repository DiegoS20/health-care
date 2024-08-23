<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicinas extends Model
{
    public $primaryKey = 'idMedicina';

    protected $fillable = [
        'nombre',
        'stock',
    ];
}
