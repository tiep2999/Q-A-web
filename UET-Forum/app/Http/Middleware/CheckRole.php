<?php


namespace App\Http\Middleware;


use App\user;
use Closure;

class CheckRole
{
    private $_obj;

    /**
     * RoleAdmin constructor.
     */
    public function __construct()
    {
        $this->_obj = new user();
    }

    public function handle($request, Closure $next)
    {
        $role = $this->_obj->checkRole("ADMIN", $request->cookie('uAct'));
        // dd($role);
        if ($role!=false) {
            return $next($request);
        }
        return redirect()->route('login');

    }
}