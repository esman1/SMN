<?php

namespace App\Http\Middleware;

use Closure;

class AddXContentTypeOptionsHeader
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
        $response = $next($request);
        
        // Agregar el encabezado 'X-Content-Type-Options' a la respuesta
        $response->header('X-Content-Type-Options', 'nosniff');

        return $response;
    }
}
