<?php


namespace App\Http\Controllers;


use App\Helper\SFunction;
use App\Http\Middleware\Logout;
use App\Model\Room;
use App\Model\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    private $_user;

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->_user = new User();
    }

    public function view()
    {
        $u = new User();
        $romm = new Room();
        $cUser = $u->getCurrentUser();
        $allRoom = $romm->getAllRoomByUserId($cUser['id'],'5');

        return CoreController::viewPage('profile', ['cUser' => $cUser, 'rooms' => $allRoom]);
    }

    public function updateUser(Request $request)
    {
        $data = $request->toArray();
        if(!empty($request->avatar)){
            $data['avatar'] = SFunction::upFile($request);
        }
        if ($data['id']) {
           $result =  $this->_user->updateUser(encrypt($data['id']),$data);
        }
        if(isset($data['userName'])||isset($data['password'])){
            $log = new Logout();
            $log->logOut();
        }
        return redirect()->route('profile');
    }

    public function insert(Request $request){
        $data = $request->toArray();
        $this->_user->insertUser($data);
        return redirect()->back();
    }
}