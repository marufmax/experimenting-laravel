<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    // public function handle($request, Clouser $next, ...$guards)
    // {
    //     if ($this->authenticate($request, $guards) === 'authentication_error') {
    //         return response()->json(['error' => 'Unauthoriezed!']);
    //     }
    //     return $next($request);
    // }

    public function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                  return $this->auth->shouldUse($guard);
            }
        }
          return 'authentication_error';
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        return route('login');
    }
}
