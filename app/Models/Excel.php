<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{
    use HasFactory;
    protected $table = 'excel';
    protected $fillable = [
        'fecha',
        'numero_documento',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'sede',
        'empresa',
        'tipo_prueba'
    ];
}
