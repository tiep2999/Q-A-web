<?php


namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Middleware\DefaultLaravel;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Config;

/**
 * @Inject App\Http\Controllers\CoreController
 */
class LoginController extends \Illuminate\Routing\Controller
{



    /**
     * LoginController constructor.
     */
    public function __construct()
    {
    }

    public function formLogin()
    {

        $DI = new DIController();
        $DI->bindClassAsSingleton('core', 'App\Http\Controllers\CoreController');
        $obj = $DI->resolve('App\Http\Controllers\LoginController');
        return $obj->viewLogin();
        // App::setLocale('en');
        //  return view('login');
    }

    public function login()
    {

        return redirect()->route('dashboard');
    }

    public function viewLogin(){
        return view('login');
    }
}
