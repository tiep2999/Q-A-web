<?php


namespace App\Http\Controllers;


use App\Http\Controllers\TableRoomController;
use App\Model\Room;
use App\Model\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

/*
 * Dashboard
 */
class DashBoardController extends  Controller
{

    private $_user;
    private $_room;

    /**
     * DashBoardController constructor.
     * @param $_user
     */
    public function __construct()
    {
        $this->_user = new User();
        $this->_room = new Room();
    }

    public function getData(){

    }

    public function view(){

        $data = $this->_room->getAll();
        $data = $this ->_room->addInfToObjRoom($data);
        $currentUser = $this->_user->getCurrentUser();
        $cate = CoreController::DataCore();
       //dd(session('currentUser'));
        return view('index',['rooms'=>$data,'cUser'=>$currentUser,'cates'=>$cate]);
    }

    public function search($request){
        $r = $request->toArray();
        $room = new Room();
        $data = $room->getRoomsByCondition($r);
        $cate = CoreController::DataCore();
        return view('index',['rooms'=>$data['data'],'cond'=>$data['condition'],'cates'=>$cate]);
    }

}