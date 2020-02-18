<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use function redirect;
use function session;

class LoginMiddleware
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
        if (!session('user')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
