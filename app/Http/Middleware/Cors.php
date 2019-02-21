<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class Cors
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
            $origin = $request->server('HTTP_ORIGIN');

        
            $response = $next($request);
            if ($origin) {
                $cors_allowed_domain_string = "http://localhost:8000,http://127.0.0.1:8000";
                $cors_allowed_domains = explode(',', trim($cors_allowed_domain_string));
                if (in_array($origin, $cors_allowed_domains)) {
                    // ALLOW OPTIONS METHOD
                        $headers = [
                        'Access-Control-Allow-Origin' => $origin,
                        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
                        'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'  //Content-Type, Accept, X-Requested-With, Authorizatio
                    ];
                    if ($request->getMethod() == "OPTIONS") {
                        // The client-side application can set only headers allowed in Access-Control-Allow-Headers
                        return Response::make('OK', 200, $headers);
                    }

                    foreach ($headers as $key => $value) {
                        $response->header($key, $value);
                    }
                }
            }
       return $response;
    }
}
