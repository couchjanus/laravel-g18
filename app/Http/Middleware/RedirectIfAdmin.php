<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAdmin
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
        if (!(auth()->user()->is_admin or auth()->user()->is_editor) ) {
            return redirect()->route('profile.home');
        }
        return $next($request);
    }
}
