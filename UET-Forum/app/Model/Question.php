<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function room()
    {
        return $this->belongsTo('App\Model\Room', 'room_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comment', 'question_id', 'id');
    }

    public function history()
    {
        return $this->hasMany('App\Model\HistoryAction', 'question_id', 'id');
    }

    public function getQuestionByRoomId($id)
    {
        try {
//            $question = Question::where('room_id',$id)->firstOrFail();
        } catch (\Exception $e) {
            return null;
        }

    }

    /*
     * @param is array
     * @return new array after addition
     */
    public function AddInfo($ques /*array*/)
    {

        foreach ($ques as $key => $que) {
            $que['room_id'] = Room::find($que['room_id'])->only('id', 'name', 'describe');
            $que['user_id'] = User::find($que['user_id'])->only('id', 'userName', 'fullName');
            $ques[$key] = $que;
        }
        return $ques;
    }

    public function getCommentByQuestionId($id)
    {
        try {


            $q = Comment::whereRaw('question_id=?', [$id])->get();
            foreach ($q as $key => $value) {
                $user = Comment::find($value->id)->user->only('id', 'userName', 'fullName');
                $value = $value->toArray();
                $value['user_id'] = $user;
                $q[$key] = $value;
            }
            return $q;
        } catch (\Exception $e) {
            dd($e);
            return null;
        }

    }

    public function insert($data)
    {
        try {
            $q = new Question();
            $q->content = (empty($data['question'])) ? '' : $data['question'];
            $q->room_id = (empty($data['room_id'])) ? '' : $data['room_id'];
            $q->user_id = (empty($data['user_id'])) ? '' : $data['user_id'];
            $q->activeFlg = 1;
            $q->created = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
            $q->save();
            return true;

        } catch (\Exception $e) {
            dd("ex insert question!");
        }

        return false;
    }

}