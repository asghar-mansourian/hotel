<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BuildApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $original = json_decode($response->getContent(), true);
        $original['code'] = $response->getStatusCode();

        $response->setContent(json_encode($original));

        return $response;
    }
}
