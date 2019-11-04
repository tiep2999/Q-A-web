<?php


namespace App\Http\Controllers;


use App\Model\Room;
use Illuminate\Support\Facades\Hash;

class JoinRoomController extends \Illuminate\Routing\Controller
{

    public function checkPass($request)
    {
        $room = new Room();
        return TableRoomController::showRoomById($request->id);
    }

}