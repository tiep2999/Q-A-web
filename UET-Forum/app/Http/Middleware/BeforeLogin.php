<?php


namespace App\Http\Middleware;


use Closure;

class BeforeLogin
{
    public function handle($request, Closure $next)
    {
        if (empty($request->cookie('uAct')) && empty($request->cookie('pAct'))) {
            return $next($request);
        }
        return redirect()->route('dashboard');

    }
}