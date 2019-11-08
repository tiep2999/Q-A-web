<?php


namespace App\Http\Middleware;

use App\Model\FunctionGlobal;
use App\Model\FunctionRoom;
use App\Model\HistoryAction;
use App\Model\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AfterLogin
{
    public function handle($request, Closure $next)
    {
       $test = new User();
       // $h = HistoryAction::find(1);
        $data = ['userName' => 'alo123', 'fullName' => 'tran hieu',
            'email' => 'lol@gmail', 'dateOfBirth' => '1999-08-20',
            'active_flg' => 1, 'role_id' => 1, 'update_date' => '2019-10-15'];
//dd($test->insertUser($data));
//        dd(User::all());
        if (!empty($request->cookie('uAct')) && !empty($request->cookie('pAct'))) {
            $data = array('username' => $request->cookie('uAct'), 'password' => $request->cookie('pAct'));
            if (Auth::attempt($data, true)) {
                return $next($request);
            }

        }
        return redirect()->route('login');
    }
}