<?php


namespace App\Http\Controllers;


use App\Http\Controllers\CoreController;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserListController extends Controller
{

    private $_user;

    /**
     * UserList constructor.
     * @param $_user
     */
    public function __construct()
    {
        $this->_user = new User();
    }

    public function show(Request $request)
    {
        $users = $this->_user->getAlls();
        return CoreController::viewPage('userList', ['users' => $users->toArray()]);
    }

    public function deleteById(Request $request)
    {
        if(isset($request->id)){
            $this->_user->deleteUser($request->id);
        }
        return redirect()->back();
    }
}