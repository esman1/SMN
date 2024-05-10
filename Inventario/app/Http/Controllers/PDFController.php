<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Asigsuc;

class PDFController extends Controller
{
    public function generarPDF($id)
    {
        $asigsuc = Asigsuc::find($id);
        
        
        $pdf = new Dompdf();
   $pdf->loadHtml("<html>
<head>
<style>
body{
    font-family: 'Courier New', Courier, monospace;
    
}
.container {
justify-content: center;
column-width: 12;
text-align: center;


}
.left{
font-size: 20px;
float: left ;
padding: 0 15px;

}
.right{
font-size: 20px;
margin-bottom: 10;

}
.table, th , td {
border: 1px solid;
border-collapse: collapse;
text-align: center;

}
tr:nth-child(even) 
{background-color: #f2f2f2;}


</style>
<body>
    <section class='content container-fluid'>
        <div class='row justify-content-center'>
            <div class='col-md-12'>
            <div class='form-group row mb-3'>
                            <div class='left'>
                                <strong>Folio:</strong>
                                " . ($asigsuc->nFol ? $asigsuc->nFol : 'N/A') . "
                            </div>
                            <div class='right'col-md-3 text-md-right'>
                                <strong>Sucursal:</strong>
                                " . ($asigsuc->sucursal ? $asigsuc->sucursal->Nom_sucursal : 'N/A') . "
                            </div>

                <div class='card'>

                    
                        <div class='table-responsive text-center'>
                            <table class='table table-striped table-hover align-middle'>

                                <thead class='thead text-center'>
                                    <tr>
                                        <th class='border'>Area</th>
                                        <th class='border'>Tipo</th>
                                        <th class='border'>Marca</th>
                                        <th class='border'>Modelo</th>
                                        <th class='border'>No.Serie</th>
                                        <th class='border'>No.Activo</th>
                                    </tr>
                                </thead>
                                <tbody class='text-center'>
                                    <tr>
                                        <td>" . ($asigsuc->area ? $asigsuc->area->nomArea : 'N/A') . "</td>
                                        <td>" . ($asigsuc->stock ? $asigsuc->stock->tipo->nomTipo : 'N/A') . "</td>
                                        <td>" . ($asigsuc->stock ? $asigsuc->stock->marca->nomMar : 'N/A') . "</td>
                                        <td>" . ($asigsuc->stock ? $asigsuc->stock->modelo->nomMod : 'N/A') . "</td>
                                        <td>" . ($asigsuc->stock ? $asigsuc->stock->Nserie : 'N/A') . "</td>
                                        <td>" . ($asigsuc->nAct ? $asigsuc->nAct : 'N/A') . "</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>");

    
        
        $pdf->setPaper('A4', 'landscape');
    
        $pdf->render();
        $sucursalNombre = $asigsuc->sucursal ? $asigsuc->sucursal->Nom_sucursal : 'N/A';
        $nombreArchivo = 'Apertura_' . $sucursalNombre . '.pdf';
    
        return $pdf->stream($nombreArchivo);
    }
    
}
