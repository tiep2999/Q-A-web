<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

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
        $all = Room::query('SELECT * FROM `room` WHERE id=',$id)->get()->toArray();
        return $all;
    }

    public function getAll()
    {
        return Room::all()->toArray();
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
            $data = $this->addInfToObjRoom(['0' => $data]);

            return ['data'=>$data['0'],'question'=>$question];
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getRoomsByCondition(array $array=[]){

        $u = new Room();
        $data = $u->newQuery();
        if (!empty($array['user_id'])) {
            $data->where('admin', 'like', $array['user_id']);
        }
        if (!empty($array['code'])) {
            $data->where('code', 'like', "%".$array['code']."%");

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
            $data->where('isDeleted', '=','1');
        }
        $da = $data->get();
        $dat = $this->addInfToObjRoom($da->toArray());
        return ['data'=>$dat,'condition'=>$array];
    }


}
