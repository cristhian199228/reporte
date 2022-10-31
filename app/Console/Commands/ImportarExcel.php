<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Excel;
use Illuminate\Support\Facades\DB;



class ImportarExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $excels = Excel::where('id', '>', '147990')
            ->get();
        foreach ($excels as $excel) {
            /*  dd($excel->numero_documento); */
            $query = DB::connection('mediweb')->select("SELECT t1.fecha, t1.idtipo, t3.descripcion, t2.nombres, t2.apellidos, t2.dni2 FROM comprobante t1
            inner join paciente t2
            on t1.idpaciente = t2.idpaciente
            inner join tipo_examen t3
            on t1.idtipo = t3.idtipo
            where t2.dni2= '" . $excel->numero_documento . "' and t1.idtipo in (2, 1, 3, 4, 12) and t1.estado = 1 order by t1.fecha desc limit 1");
            if (count($query) > 0) {
                Excel::where('id', $excel->id)->update(
                    [
                        'generado' => '1',
                        'fecha_mw' => $query[0]->fecha,
                        'idtipo' => $query[0]->idtipo,
                        'descripcion' => $query[0]->descripcion,
                        'dni2' => $query[0]->dni2
                    ]
                );
            }
        }
    }
}
