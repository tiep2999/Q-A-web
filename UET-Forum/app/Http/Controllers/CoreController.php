<?php


namespace App\Http\Controllers;


use App\Model\Category;
use App\Model\Room;
use App\Model\User;

class CoreController extends \Illuminate\Routing\Controller
{

    public function showLogin(){

        return view('login');
    }

    public static function DataCore(){
        $data['cates']= Category::all()->toArray();
        $data['curUser'] = User::find(decrypt($_COOKIE['id']))->toArray();
        $room = new Room();
        $data['count']['room'] = $room->getAll()->count();
        $data['count']['myRoom'] = Room::where('isDeleted', '0')->where('admin',decrypt($_COOKIE['id']))->get()->count();
//        $data['count']['user'] = User::where('active_flg','1')->get()->count();
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