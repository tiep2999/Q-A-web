<?php


namespace App\Http\Controllers;


use App\Helper\SFunction;
use App\Model\Question;
use App\Model\Room;
use App\Model\User;
use Symfony\Component\Console\Helper\Helper;

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

    static  function showRoomById($id,$open=false)
    {
        $room = new Room();
        $data = $room->getRoomById($id);
        if (empty($data['data']['password'])||$open==true)
           // return view('room', ['room' => $data['data'], 'question' => $data['question']]);

            return CoreController::viewPage('room',['room'=>$data['data'],'question'=>$data['question']]);
        else{
            return CoreController::viewPage('roomjoin',['room'=>$data['data']]);
        }

    }

    static function checkPass($request){
        $data = Room::find($request->id)->toArray();
        if(SFunction::checkPass($request->password,$data['password'],'md5')){
            return self::showRoomById($request->id,true);
        }
        return self::showRoomById($request->id);
    }

    public function postQuestion($request){
        $question = new Question();
        $curUser = User::getCurrentUser();
        if($curUser['remember_token']==$request->room_id){
            if($question->insert($request->toArray())){
                return self::showRoomById($request->room_id,true);
            }
            return self::showRoomById($request->room_id,true);
        }else{
            return CoreController::viewPage('login',['']);
        }

    }

    public function postRoom($request){

        $curUser = User::getCurrentUser();
        $data = $request->toArray();
        $data['user_id'] = $curUser['id'];
        $room = new Room();
        $value = $room->insert($data);
        if($value!=false){
            return self::showRoomById($value,true);
        }
        return redirect()->back();
    }


}