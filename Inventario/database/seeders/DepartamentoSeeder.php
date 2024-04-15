<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Departamento;


class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
       public function run()
       {
           // Ruta completa del archivo Excel
           $excelFile = '/Users/usuario/Desktop/Departamentos.csv'; // Reemplaza 'tu_usuario' con tu nombre de usuario en el sistema
   
           // Cargar el archivo Excel
           $spreadsheet = IOFactory::load($excelFile);
   
           // Obtener la primera hoja del archivo
           $worksheet = $spreadsheet->getActiveSheet();
   
           // Iterar sobre las filas del archivo
           foreach ($worksheet->getRowIterator() as $row) {
               $data = [];
               foreach ($row->getCellIterator() as $cell) {
                   $data[] = $cell->getValue();
               }
   
               // Insertar los datos en la tabla de puestos
               Departamento::create([
                   'Clave_dep' => $data[0],
                   'Desc_corta_d' => $data[1],
                   'Desc_d' => $data[2],
               ]);
           }
       }
    }

