<?php

namespace App\Http\Middleware;

use Closure;

class FixCharsetHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Ejecutar el siguiente middleware y obtener la respuesta
        $response = $next($request);
        
        // Verificar si la respuesta es de tipo 'application/javascript'
        if ($response->headers->get('content-type') === 'application/javascript') {
            // Si es así, establecer el conjunto de caracteres en 'UTF-8'
            $response->header('Content-Type', 'application/javascript; charset=utf-8');
        }

        return $response;
    }
}
