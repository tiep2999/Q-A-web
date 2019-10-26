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
        return CoreController::viewPage('index',['rooms'=>$data,'cUser'=>$currentUser]);
    }

    public function search($request){
        $r = $request->toArray();
        $room = new Room();
        $data = $room->getRoomsByCondition($r);
        return CoreController::viewPage('index',['rooms'=>$data['data'],'cond'=>$data['condition']]);
    }

}