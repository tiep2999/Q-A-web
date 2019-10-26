<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class Logout
{
    public function handle($request, Closure $next)
    {
        if (!empty(\cookie('uAct'))) {
            Cookie::queue('pAct', '', 0);
            Cookie::queue('uAct', '', 0);
            if (!empty(session()->get('role'))) {
                session()->forget('role');
            }
        }

        return redirect('/');
    }
}