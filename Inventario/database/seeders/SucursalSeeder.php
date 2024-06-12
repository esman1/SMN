<?php

namespace Database\Seeders;

use PhpOffice\PhpSpreadSheet\IOFactory;
use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $excelFile = 'C:\xampp\htdocs\SMN\Sucursales.csv';
        $spreadsheet = IOFactory::load($excelFile);
        $worksheet = $spreadsheet->getActiveSheet();
        foreach($worksheet->getRowIterator() as $row){
            $data = [];
            foreach($row->getCellIterator() as $cell){
                $data[]=$cell->getValue();
            }
            Sucursal::create([
                'Clave_sucursal' => $data[0],
                'Nom_sucursal' => $data[1],
                'ext'=>$data[2],
                'tel'=>$data[3]
            ]);
        }

    }
}
