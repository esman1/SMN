<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Puesto;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta completa del archivo Excel

        //$excelFile = 'C:\xampp\htdocs\SMN\Puestos.csv'; // Reemplaza 'tu_usuario' con tu nombre de usuario en el sistema

        $excelFile = 'C:\Users\Ezequiel Perez\Desktop\SMN\Puestos.csv'; // Reemplaza 'tu_usuario' con tu nombre de usuario en el sistema


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
            Puesto::create([
                'Clave_puesto' => $data[0],
                'Des_cort_p' => $data[1],
                'descripcion' => $data[2],
            ]);
        }
    }
}
