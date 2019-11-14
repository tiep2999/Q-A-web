<?php

namespace App\Model;

use Illuminate\Support;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Notifiable;

    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userName', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * User constructor.
     */
    public function __construct()
    {
    }


    public function getAuthIdentifierName()
    {
    }

    public function getAuthIdentifier()
    {
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
    }

    public function roleGlobal()
    {
        return $this->belongsTo('App\Model\RoleGlobal', 'role_id', 'id');
    }

    public function room()
    {
        return $this->belongsToMany('App\Model\Room', 'room_user', 'user_id', 'room_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comment', 'user_id');
    }

    public function history()
    {
        return $this->hasMany('App\Model\HistoryAction', 'user_id');
    }


    public function checkRole($role, $name)
    {
        $col = new Collection();
        //   $obj = User::whereRaw("username = ? and role = ?", array($name, $role))->get()->first();
//        if (empty($obj)) {
//            return false;
//        }
        return true;
    }

    public function getUserById($id)
    {
        try {
            $user = User::find($id);
            return $user;
        } catch (\Exception $e) {
            return null;
        }

    }

    public function getAlls()
    {
        $all = user::all();
        return $all;
    }

    public function getUserByUserName($userName)
    {
        try {

            $data = User::where("userName", $userName)->firstOrFail();
            return $data;
        } catch (\Exception $E) {

            return null;
        }

    }

    static function getCurrentUser()
    {
        //  $user = session('currentUser');
        $user = User::find(decrypt($_COOKIE['id']))->toArray();
        return $user;
    }

    public function deleteById($id)
    {
        $u = User::find($id);
        $u->active_flg = 0;
        $u->save();
        $data = User::where("id = ? and active_flg = ?", array($id, 0));
        if (!empty($data)) {
            return true;
        }
        return false;
    }


    public function userExist($data)
    {
        /*
         * @param data is array...
         */
        try {
            $ex = User::where("userName", $data['userName'])->where("active_flg", 1)->firstOrFail();
            if (empty($ex)) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    public function updateUser($id, $data)
    {

        try {
            $u = User::find(decrypt($id));
            if (isset($data['avatar'])) {
                if (!empty($data['avatar'])) $u->avatar = $data['avatar'];
            }
            if (!empty($data['userName'])) $u->userName = $data['userName'];
            if (!empty($data['fullName'])) $u->fullName = $data['fullName'];
            if (!empty($data['email'])) $u->email = $data['email'];
            if (!empty($data['dateOfBirth'])) $u->dateOfBirth = $data['dateOfBirth'];
            $u->update_date = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
            $u->active_flg = 1;
            $u->save();
            $lastId = $u->id;
            return $lastId;
        } catch (\Exception $e) {
            dd($e);
        }
        return null;

    }
// encrypt id before update
    public function setTokenRoom($id, $token)
    {
        try {
            $u = User::find(decrypt($id));
            $u->remember_token = $token;
            $u->save();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function insertUser($data)
    {
        $res = $this->userExist($data);
        if ($res | empty($data['userName'])) {
            return false;
        } else {
            try {
                $u = new User();
                $u->userName = (empty($data['userName'])) ? '' : $data['userName'];
                $u->fullName = (empty($data['fullName'])) ? '' : $data['fullName'];
                $u->email = (empty($data['email'])) ? '' : $data['email'];
                $u->password = (empty($data['password'])) ? Support\Facades\Hash::make('') : Support\Facades\Hash::make($data['password']);
                $u->dateOfBirth = (empty($data['dateOfBirth'])) ? '' : $data['dateOfBirth'];
                $u->role_id = (empty($data['role_id'])) ? '2' : $data['role_id'];
                $u->update_date = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
                $u->active_flg = 1;
                $u->save();
                return true;
            } catch (\Exception $E) {
                dd('exception insert');
            }
        }
    }

    public function findUserById($id)
    {
        try {
            $u = User::find($id);
            return (empty($u)) ? false : true;

        } catch (\Exception $e) {
            dd($e);
            return false;
        }
    }
}
