<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ManagerRole
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
        if (auth()->user()->isManager()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
