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

        // Configurar Dompdf para permitir imágenes remotas
        $pdf->set_option('isRemoteEnabled', true);
        
        // Calcular la fecha actual
        $fechaActual = ucfirst(strftime('%d de %B de %Y', time()));
        
        // Obtener la ruta y codificar la imagen en base64
        $tipoEquipo = $asigaper->stock ? $asigaper->stock->Tipo->nomTipo : null;
        
        $tipoEquipoLower = strtolower($tipoEquipo);
        
        if ($tipoEquipoLower === 'laptop') {
            $logoPath = public_path('imagen/smn.png');
        } elseif ($tipoEquipoLower === 'celular') {
            $logoPath = public_path('imagen/benito.png');
        } else {
            $logoPath = public_path('imagen/smn2.png'); // Imagen por defecto si no es laptop ni celular
        }
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));

        $html = '<!DOCTYPE html>
        <html lang="es">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px auto;
            max-width: 800px;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
            font-size: 14px;
        }

    
        .header img {
            width: 250px;  /* Ajusta el ancho según tus necesidades */
            height: auto; /* Mantiene la proporción de la imagen */
            float: left;
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: normal;
            font-size: 13px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .signature-group {
            margin-top: 30px;
            overflow: auto;
        }

        .signature {
            float: left;
            width: 45%;
            text-align: center;
            line-height: 2.5em;
            margin-right: 5%;
        }

        .signature:last-child {
            margin-right: 0;
        }

        .signature p {
            font-weight: bold;
            margin: 0;
        }

        .fecha {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-transform: uppercase;
            font-size: 13px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
        </head>
        <body>

        <div class="header">
            <img src="' . $logoBase64 . '" alt="Logo de la empresa">
            <div class="fecha">
                <strong>En Naucalpan, Edo. De Méx ' . $fechaActual . '</strong>
            </div>
        </div>

        <div class="form-group">
        <br><br>
            <label style="font-weight: bold;" for="numero_empleado">No.Empleado: ' . ($asigaper->empleado ? $asigaper->empleado->Clave_empleado : 'N/A') .'</label>
        </div>
        <div class="form-group">
            <label style="font-weight: bold;" for="nombre">Nombre: ' . ($asigaper->empleado ? $asigaper->empleado->nombre . ' ' . $asigaper->empleado->apellidoP . ' ' . $asigaper->empleado->apellidoM : 'N/A') .'</label>
        </div>

        <div class="form-group">
            <label style="margin-bottom: 30px;" for="descripcion_equipo">Por medio de la presente hago constar que recibí de <label style="font-weight:bold;"> Súper Mayoreo Naturista S.A. de C.V. </label>
            el siguiente equipo para uso exclusivo del desempeño de mis actividades laborales
            asignadas, y consta de las siguientes características:</label>
            <table class="table table-striped table-hover" style="margin-top: 20px;">
                <tbody class="border border-secondary text-center">
                    <tr>
                        <th scope="row">Tipo:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->Tipo->nomTipo : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Activo:</th>
                        <td>' . ($asigaper->Nactivo ? $asigaper->Nactivo : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Marca:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->marca->nomMar : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Modelo:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->modelo->nomMod : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Sistema Operativo:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->sisop->nomSis : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Procesador:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->procesador->nomProc : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Memoria:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->memoria->tipoMem : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Disco Duro:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->discod->nomDis : 'N/A') . '</td>
                    </tr>
                    <tr>
                        <th scope="row">S/N:</th>
                        <td>' . ($asigaper->stock ? $asigaper->stock->Nserie : 'N/A') . '</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <label>Al momento de recibir el equipo anteriormente especificado con sus accesorios completos como
            cargador, cable USB, caja y manuales, se realizaron pruebas y no cuenta con ningún daño
            físico que impida su adecuado funcionamiento; por lo que hago constar que el equipo se
            encuentra en condiciones adecuadas para recibir, así mismo, estoy consciente que el equipo
            es para el <label style="font-weight: bold; text-decoration: underline;">uso exclusivo de las funciones de trabajo asignadas por la empresa, por lo que
            me queda estrictamente prohibido cargar otro tipo de software o contenido no autorizado
            por el área de Sistemas.</label><br><br><label style="font-weight: bold;">
            El robo, extravió, daño total o parcial del equipo, será responsabilidad de quien recibe y
            los gastos que se generen para sustituirlos correrán por cuenta del usuario. Toda
            reparación de equipo deberá de ser gestionada y reparada por el proveedor oficial de
            Súper Mayoreo Naturista S.A. de C.V.</label><br><br><br>
        </div>

        <div class="signature-group">
            <div class="signature">
                <label style="font-weight: bold;">SISTEMAS</label>
                <br><br>
                <p>_____________________________</p>
                <p>Nombre Completo y Firma</p>
            </div>
            <div class="signature">
                <label style="font-weight: bold;">RECIBO</label>
                <br><br>
                <p>_____________________________</p>
                <p>Nombre Completo y Firma</p>
            </div>
        </div>
        </body>
        </html>';

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        
        $AsignacionNombre = $asigaper->empleado ? $asigaper->empleado->nombre . ' ' . $asigaper->empleado->apellidoP : 'N/A';
        $nombreArchivo = 'ASIGNACION_' . $AsignacionNombre . '.pdf';
        return $pdf->stream($nombreArchivo);
    }

    public function mostrarGenerar()
    {
        return view('generar.pdf');
    }
}