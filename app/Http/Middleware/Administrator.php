<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        if (! auth()->check()) {
            throw new AuthorizationException('You do not have permission to access this page.');
        }

        if (! $request->user()->is_admin) {
            throw new AuthorizationException('You do not have permission to access this page.');
        }

        return $next($request);
    }
}
