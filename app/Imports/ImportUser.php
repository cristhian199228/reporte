<?php

namespace App\Imports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Excel([
            'fecha'     => $row[0],
            'numero_documento'    => $row[1],
            'nombres' => $row[2],
            'apellido_paterno' => $row[3],
            'apellido_materno' => $row[4],
            'sede' => $row[5],
            'empresa' => $row[6],
            'tipo_prueba' => $row[7],
        ]);
    }
}
