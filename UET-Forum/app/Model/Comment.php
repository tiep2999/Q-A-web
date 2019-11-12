<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function question()
    {
        return $this->belongsTo('App\Model\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function getCommentById($id)
    {
        try {
            $data = Comment::find($id);
            return $data;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function insert($data){

        $c = new Comment();
        try{

            $c->user_id = (empty($data['user_id']))? '' : $data['user_id'];
            $c->content = (empty($data['comment']))? '' : $data['comment'];
            $c->question_id = (empty($data['question_id']))? '' : $data['question_id'];
            $c->lastUpdated = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
            $c->activeFlg = 1;
            $c->voted = 1;
            $c->up = 0;

            $c->save();

        }catch(\Exception $e){
          //  dd("ex comment");
        }
        return false;
    }

    public function deleteById($id){

    }

    public function updateById($id,$data){

    }


}