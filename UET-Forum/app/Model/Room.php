<?php


namespace App\Model;


use App\Http\Controllers\CoreController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Room extends Model
{
    protected $table = "room";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function category()
    {
        return $this->hasMany('App\Model\Category', 'id', 'category_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\Model\User', 'room_user', 'room_id', 'user_id');
    }

    public function status()
    {
        return $this->hasMany('App\Model\StatusRoom', 'id', 'status_id');
    }

    public function question()
    {
        return $this->hasMany('App\Model\Question', 'room_id', 'id');
    }

    public function history()
    {
        return $this->hasMany('App\Model\HistoryAction', 'room_id');
    }

    public function getAllRoomByUserId($id)
    {
        $all = Room::where('isDeleted', '0')->where('admin',$id)->get()->toArray();
        return $all;
    }

    public function getAll()
    {
        return Room::where('isDeleted', '0')->get();
    }

    public function addInfToObjRoom($rooms /* array $rooms*/)
    {

        foreach ($rooms as $key => $value) {
            $value['admin'] = User::find($value['admin'])->only('id', 'userName', 'fullName');
            $value['category_id'] = Category::find($value['category_id'])->toArray();
            $value['status_id'] = StatusRoom::find($value['status_id'])->toArray();
            $rooms[$key] = $value;
        }

        return $rooms;
    }

    public function getRoomById($id)
    {
        try {
            $q = new Question();
            $question = Room::find($id)->question->toArray();
            $question = $q->AddInfo($question);
            $data = Room::find($id)->toArray();
            if ($data['isDeleted'] == 1) {
                return null;
            }
            $data = $this->addInfToObjRoom(['0' => $data]);

            return ['data' => $data['0'], 'question' => $question];
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getRoomsByCondition(array $array = [])
    {

        $u = new Room();
        $data = $u->newQuery();

        if (!empty($array['user_id'])) {
            $data->where('admin', 'like', $array['user_id']);
        }
        if (!empty($array['code'])) {
            $data->where('code', 'like', "%" . $array['code'] . "%");
        }
        if (!empty($array['category_id'])) {
            $data->where('category_id', 'like', $array['category_id']);
        }
        if (!empty($array['voted'])) {
            $data->where('voted', '>=', '1');
        }
        if (!empty($array['new'])) {
            $data->orderBy('created', 'DESC');
        }
        if (!empty($array['deleted'])) {
            $data->where('isDeleted', '=', '1');
        } else {
            $data->where('isDeleted', '=', 0);
        }
        $da = $data->get();
        $dat = $this->addInfToObjRoom($da->toArray());
        return ['data' => $dat, 'condition' => $array];
    }


    public function insert($data)
    {
        $r = new Room();

        try {

            $r->code = (empty($data['name'])) ? '' : $data['name'] . strval(rand(0, 99));
            $index = $r->code;
            $r->name = (empty($data['name'])) ? '' : $data['name'];
            $r->password = (empty($data['password'])) ? '' : md5($data['password']);
            $r->category_id = (empty($data['cate'])) ? '' : $data['cate'];
            $r->describe = (empty($data['describe'])) ? '' : $data['describe'];
            $r->status_id = 1;
            $r->admin = (empty($data['user_id'])) ? '' : $data['user_id'];
            $r->created = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
            $r->updated = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
            $r->voted = 1;
            $r->isDeleted = 0;

            $r->save();
            $rMol = new Room();
            $room = $rMol->getRoomsByCondition(['code' => $index]);
            return $room['data']['0']['id'];
        } catch (\Exception $e) {
            dd("ex insert room!" . $e);
        }
        return false;
    }

    public function deleteById($id)
    {
        try {
            $r = Room::find($id);
            $r->isDeleted = 1;
            $user = User::getCurrentUser();
            if ($user['id'] == $r->admin) {
                $r->save();
                return true;
            } else {
                return "404";
            }

        } catch (\Exception $e) {
            dd("error deleted");
        }

    }

    public function updateById($id, $data)
    {
        try {
            $room = Room::find($id);
            if ($room->isDeleted == 0) {
                $room->name = (isset($data['name'])) ? $data['name'] : '';
                $room->category_id = (isset($data['cate'])) ? $data['cate'] : '';
                $room->describe = (isset($data['describe'])) ? $data['describe'] : '';
                $room->updated = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
                $room->password = (isset($data['password_new'])) ? md5($data['password_new']) : md5('');
                $user = User::getCurrentUser();
                if ($user['id'] == $room->admin) {
                    $room->save();
                    return true;
                }
                return false;

            }
        } catch (\Exception $e) {
            dd("error update!");
        }
        return false;
    }

}
