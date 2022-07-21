<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('is_loggedin') != 1){
            return redirect()->to(url(''))->withErrors(['Authentication Not Found']);
        }
        return $next($request);
    }
}
