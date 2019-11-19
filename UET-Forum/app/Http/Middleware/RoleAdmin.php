<?php


namespace App\Http\Middleware;


use App\Model\User;
use Closure;

class RoleAdmin
{
    public function handle($request, Closure $next)
    {

        $u = User::getCurrentUser();
        if ($u['role_id'] == 1) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}