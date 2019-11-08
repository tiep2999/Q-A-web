<?php


namespace App\Http\Controllers;


use App\Model\Category;
use App\Model\User;

class CoreController extends \Illuminate\Routing\Controller
{

    public function showLogin(){

        return view('login');
    }

    public static function DataCore(){
        $data['cates']= Category::all()->toArray();
        $data['curUser'] = User::find(decrypt($_COOKIE['id']))->toArray();
        return $data;

    }

    public static function viewPage(string $link, array $data){
        $core = CoreController::DataCore();
        $data = array_merge($data,$core);
        if(isset($data['room'])&&isset($data['question'])){
            $u = new User();
            $u->setTokenRoom($_COOKIE['id'],$data['room']['id']);
        }
        return view($link,$data);
    }

}