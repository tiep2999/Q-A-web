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

            $user = User::getCurrentUser();
            $user['remember_token']=$data['room']['id'];
            $u = new User();
            $u->updateUser($_COOKIE['id'],$user);
        }
        return view($link,$data);
    }

}