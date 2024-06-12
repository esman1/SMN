<?php

namespace Database\Seeders;

use PhpOffice\PhpSpreadSheet\IOFactory;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void 
     */
    public function run()
    {
<<<<<<< Updated upstream
        $excelFile = '/Users/usuario/Desktop/empleados.csv';
=======
        $excelFile = 'C:\xampp\htdocs\SMN\empleados.csv';
>>>>>>> Stashed changes
        $spreadsheet = IOFactory::load($excelFile);
        $worksheet = $spreadsheet->getActiveSheet();
        foreach($worksheet->getRowIterator() as $row){
            $data = [];
            foreach($row->getCellIterator() as $cell){
                $data[]=$cell->getValue();
            }
            Empleado::create([
                'Clave_empleado' => $data[0],
                'nombre'=>$data[1],
                'apellidoP'=>$data[2],
                'apellidoM'=>$data[3],
                'estatus_id'=>$data[4],
                'departamento_id'=>$data[5],
                'sucursal_id'=>$data[7],
                'puesto_id'=>$data[9],
                'fecha_contrat'=>$data[11],
                'fecha_baja'=>$data[12],
                'fecha_alta'=>$data[13],
                'estatusv'=> $data[14],
               

            ]);
        }
    }
}
