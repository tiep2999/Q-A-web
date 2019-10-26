<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Lang
{
    public function handle($request, Closure $next)
    {
        if (Session::has('lang')) {
            App::setLocale(Session::get('lang'));
            // dd('lang');
        }
        return $next($request);
    }
}