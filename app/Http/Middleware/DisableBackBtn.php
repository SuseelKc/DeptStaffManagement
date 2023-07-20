<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisableBackBtn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @param  \Symfony\Component\HttpFoundation\Response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Cache-Control', 'nocache,no-store,max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 2023 00:00:00 GMT');
        return $response;
    }
}
