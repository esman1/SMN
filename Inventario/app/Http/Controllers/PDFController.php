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
        $pdf->set_option('isRemoteEnabled', true);
        
        // Calcular la fecha actual
        $fechaActual = ucfirst(strftime('%d de %B de %Y', time()));
        $tipoEquipo = $asigsuc->stock ? $asigsuc->stock->Tipo->nomTipo : null;
        
        $tipoEquipoLower = strtolower($tipoEquipo);
        
        if ($tipoEquipoLower === 'laptop') {
            $logoPath = public_path('imagen/smn.png');
        } elseif ($tipoEquipoLower === 'celular') {
            $logoPath = public_path('imagen/benito.png');
        } else {
            $logoPath = public_path('imagen/smn2.png'); // Imagen por defecto si no es laptop ni celular
        }
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
   $pdf->loadHtml('<!DOCTYPE html> <html>
   <head>
   <style>
   body {
       font-family: Arial, sans-serif;
       margin: 20px auto;
       max-width: 870px;
      
       
}
   
   .header {
       text-align: center;
       margin-bottom: 50px;
       font-size: 17px;
    
   
   }
   
   
   .header img {
       width: 250px;  /* Ajusta el ancho según tus necesidades */
       height: auto; /* Mantiene la proporción de la imagen */
       float: left;
       margin-right: 5px;
   }
   
                       
                   
                          
               .fecha {
                   text-align: right;
               }
               
                .inven {
                    flex-grow: 1; /* Toma el espacio disponible */
                    text-align: center;
                    margin-bottom: 20px;
                    font-size: 18px;
                
               }
   
               .form-group {
                   margin-top: 75px;
                   
               }
       
               .form-group label {
                   font-weight: normal;
                   font-size: 16px;
                   
                   
               }
       
               .form-group input,
               .form-group textarea {
                   width: 100%;
                   padding: 8px;
                   border-radius: 5px;
                   border: 1px solid #ccc;
               }
               .signature-group {
                margin-top: 95px;
                overflow: auto;
                text-align: center;
                page-break-before: always; /* Salto de página antes de la sección */
                
            }
            
            .signature {
                float: none;
                width: 30%; 
                display: inline-block;
                text-align: center;
                line-height: 2.5em;
                margin: 0 1.66%; 
                text-transform: uppercase;
                margin-bottom: 20px;
            }
            
            
            .signature:first-child { 
                margin-right: 30%; /* Adjust this value as needed for more spacing */
            }
            
            .signature:last-child {
                margin-right: 1.66%; 
            }
       
               .signature p {
                   font-weight: bold;
                   margin: 0;
               }
               @page {
                header: page-header;
            }
    
            @page {
                @top-center {
                    content: element(header);
                }
            }
    
            #page-header {
                position: fixed;
                top: 0;
                left:0;
                right: 50px;
            }
            .table-container {
            width: 100%; /* O el ancho deseado */
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            }

            table {
           
            border-collapse: collapse;
            text-transform: uppercase;
            font-size: 13px;
            width: 90%; /* Ancho de la tabla al 90% del contenedor */
    margin: 0 auto;
        }

        th, td {
            padding: 8px;
            
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .border {
            border: 1px solid #ddd;
        }

        .text-center {
            text-align: center;
        }

               
            
           </style>
   <body>
   
               <div class="header" id="page-header">
               <img src="' . $logoBase64 . '" alt="Logo de la empresa">
               
               <div class="fecha">
                   <strong>En Naucalpan, Edo. De Méx ' . $fechaActual . '</strong><br>
                   <label style="font-weight: bold;" for="numero_empleado">' . ($asigsuc->sucursal ? $asigsuc->sucursal->Nom_sucursal : 'N/A') .'</label>
               </div>
           </div>
           
   <div class="form-group">
   <div class="inven">
               <strong>Inventario Sucursal</strong>
               </div>
   <label>Por medio de la presente, se autoriza la salida de Equipo de las oficinas de SUPER MAYOREO NATURISTA para la sucursal de <label style="font-weight:bold;">' . ($asigsuc->sucursal ? $asigsuc->sucursal->Nom_sucursal : 'N/A') .'</label>.  (   cajas 1 paquete)</label>
   </div>
           
   <div class="table-container">
   
    <table class="table table-striped table-hover" style="margin-top: 20px;">
        <tbody class="border border-secondary text-center">
            <tr><th class="border" scope="row">Area</th>
                <th class="border" scope="row">Marca</th>
                <th class="border" scope="row">Modelo</th>
                <th class="border" scope="row">No.Serie</th>
                <th class="border" scope="row">No.Activo</th>
                </tr>

                <td class="border" >
                    ' . ($asigsuc->area ? $asigsuc->area->nomArea : 'N/A') .'
                </td>
            <td class="border"> ' . ($asigsuc->stock ? $asigsuc->stock->Marca->nomMar : 'N/A') .'</td>
            <td class="border"> ' . ($asigsuc->stock ? $asigsuc->stock->Modelo->nomMod : 'N/A') .'</td>
            <td class="border"> ' . ($asigsuc->stock ? $asigsuc->stock->Nserie : 'N/A') .'</td>
            <td class="border"> ' . ($asigsuc->nAct ? $asigsuc->nAct : 'N/A') .'</td>
     
        </tbody>
    </table>
</div>
       <div class="signature-group">
       
       <div class="form-group" >
                  <label style="text-align: center;"> Quedando a sus órdenes para cualquier aclaración con respecto a este tema</label><br>
                  <label >Departamento de Sistemas <label style="font-weight:bold;">Ext. 2624</label>
                  
</label>                  
                  </div><br><br><br><br><br><br>
       <div class="signature">
           <label style="font-weight: bold;">Sucursal</label>
           <br><br>
           <p>_____________________________</p>
           <p>Nombre Completo y Firma</p>
       </div>
       <div class="signature">
           <label style="font-weight: bold;">Sistemas</label>
           <br><br>
           <p>_____________________________</p>
           <p>Nombre Completo y Firma</p>
       </div>
  
       <div class="signature">
           <label style="font-weight: bold;">Embarques</label>
           <br><br>
           <p>_____________________________</p>
           <p>Nombre Completo y Firma</p>
       </div>
   </div>
      
   </div>
   </body>
   </html>
');

    
        
        $pdf->setPaper('A4', 'landscape');
    
        $pdf->render();
        $sucursalNombre = $asigsuc->sucursal ? $asigsuc->sucursal->Nom_sucursal : 'N/A';
        $nombreArchivo = 'APERTURA_' . $sucursalNombre . '.pdf';
    
        return $pdf->stream($nombreArchivo);
    }
    
}
