<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Asigaper;

class PDFEMPLEController extends Controller
{
    public function generarPDF($id)
    {
        $asigaper = Asigaper::find($id);
        
        
        $pdf = new Dompdf();
   $pdf->loadHtml("<html>
<head>
<style>
                body{
                    font-family: 'Courier New', Courier, monospace;
                    display: block;
  width: 100%; /* Set the image width to 100% of the viewport */
  margin: 20px auto;
                    
                }
            .container {
                justify-content: center;
                column-width: 12;
                text-align: center;
                margin: 50px 20px;
                

            }
            .left{
                font-size: 20px;
                float: left ;
                padding: 0 15px;

            }
            .right{
                font-size: 20px;
                margin-bottom: 15px;
               
             
            }
            .table, th , td {
                border: 1px solid;
                border-collapse: collapse;
                text-align: center;
                text-transform: uppercase; 
                
            }
            tr:nth-child(even) 
            {background-color: #f2f2f2;}

            th{
             
            }
           
            
        </style>
<body>
    <section class='content container-fluid'>
        <div class='row justify-content-center'>
            <div class='col-md-12'>
            <div class='form-group row mb-3'>
                            <div class='left'>
                                <strong>Folio:</strong>
                               
                            </div>
                            <div class='right'>
                            <strong>En Naucalpan, Edo. De Méx ' . date('d \d\e F \d\e Y') . '</strong>';


                                
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
        $AsigancionNombre = $asigaper->empleado ? $asigaper->empleado->nombre . ' ' . $asigaper->empleado->apellidoP : 'N/A' ;
        $nombreArchivo = 'ASIGNACION_' . $AsigancionNombre . '.pdf';
    
        return $pdf->stream($nombreArchivo);
    }
    
}
