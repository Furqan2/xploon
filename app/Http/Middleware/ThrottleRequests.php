<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests as BaseThrottleRequests;


class ThrottleRequests extends BaseThrottleRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    protected function resolveRequestSignature($request)
    {
        dd("hekko");
        return sha1($request->method().$request->route()->getDomain().$request->route()->uri().'hourly-limit');
    }

    protected function buildResponse($key, $maxAttempts)
    {
        $response = parent::buildResponse($key, $maxAttempts);
        $response->header('Retry-After', 3600); // Set Retry-After header to 1 hour

        return $response;
    }

    protected function calculateRemainingAttempts($key, $maxAttempts, $decaySeconds)
    {
        dd("hekko");
        return $maxAttempts - $this->cache->get($key.':lockout') + 1;
    }

}
