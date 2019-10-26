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

}