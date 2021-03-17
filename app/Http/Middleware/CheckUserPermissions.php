<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserPermissions
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
        if (!isAdmin()){
            if (!isset($request->route('user')->id)
                || $request->route('user')->id != Auth::id() )
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
