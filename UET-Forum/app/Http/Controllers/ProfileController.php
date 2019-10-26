<?php


namespace App\Http\Controllers;


use App\Model\Room;
use App\Model\User;

class ProfileController extends Controller
{
public function view(){
    $u = new User();
    $romm = new Room();
    $cUser = $u->getCurrentUser();
    $allRoom = $romm->getAllRoomByUserId($cUser['id']);
    return view('profile',['cUser'=>$cUser,'rooms'=>$allRoom]);
}
}