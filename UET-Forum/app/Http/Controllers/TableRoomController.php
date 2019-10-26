<?php


namespace App\Http\Controllers;


use App\Model\Room;
use App\Model\User;

class TableRoomController extends \Illuminate\Routing\Controller
{

    /**
     * TableRoomController constructor.
     */
    private $_room;

    public function __construct()
    {
        $this->_room = new Room();
    }

    public function showRoomById($id)
    {
        $data = $this->_room->getRoomById($id);
        if (empty($data['data']['password']))
            return view('room', ['room' => $data['data'], 'question' => $data['question']]);
        else
            return view('roomjoin');
    }

}