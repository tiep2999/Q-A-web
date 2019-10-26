<?php


namespace App\Http\Middleware;


use App\Model\RoleGlobal;
use App\Model\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckLogin
{
    public function handle($request, Closure $next)
    {

        $user = new User();
        $inputAccount = $request->all();
        if (!empty($inputAccount)) {
            $data = array('userName' => $inputAccount['userName'], 'password' => $inputAccount['password'], 'active_flg' => 1);

            //dd($data);
            try {
                $check = Auth::attempt($data, true);
//                $request-->session()->put('user',Auth::user());

                if ($check) {

                    $crUser = $user->getUserByUserName($data['userName'])->toArray();
                    if ($request->remember == 'on') {
                        setcookie('id',encrypt($crUser['id']),time()+(24 * 60 * 30*60));
                        setcookie('fullName',$crUser['fullName'],time()+(24 * 60 * 30));
                        Cookie::queue('uAct', $data['userName'], 24 * 60 * 30);
                        Cookie::queue('pAct', $data['password'], 24 * 60 * 30);
                    } else {
                        setcookie('id',encrypt($crUser['id']),time()+20*60);
                        setcookie('fullName',$crUser['fullName'],time()+20*60);
                        Cookie::queue('uAct', $data['userName'], 20);
                        Cookie::queue('pAct', $data['password'], 20);
                    }

                    if (empty($crUser)) return redirect('/');
                    else {
                        session()->put('currentUser',$crUser);
                    }

                    return $next($request);
                }

            } catch (\Exception $e) {
                dd($e);
            }
        }

        return redirect('/');
    }
}