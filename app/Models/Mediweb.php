<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediweb extends Model
{
    use HasFactory;
    protected $connection = 'mediweb';
    protected $table = 'paciente';
}
