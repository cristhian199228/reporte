<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportUser;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
    public function import()
    {
        Excel::import(
            new ImportUser, 'reporte.xlsx'
        );

       return redirect('/')->with('success', 'Users Import Successfully!');
    }
}
