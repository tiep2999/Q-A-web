<?php


namespace App\Http\Controllers;


use App\Model\Comment;
use App\Model\User;
use Illuminate\Http\Request;

class CommentController extends \Illuminate\Routing\Controller
{

    private $_comment;

    /**
     * CommentController constructor.
     */
    public function __construct()
    {
        $this->_comment = new Comment();
    }

    public function deleteById(Request $request)
    {
        $data = $request->toArray();
        try {
            $com = Comment::find($request->id);
            if (decrypt($_COOKIE['id']) == $com->user_id) {
                $value = $this->_comment->deleteById($data['id']);
            }
        } catch (\Exception $e) {
        }
        return redirect()->back();
    }

    public function updateComment(Request $request)
    {
        $data = $request->toArray();
        try {
            $com = Comment::find($request->id);
            if (decrypt($_COOKIE['id'] == $com->user_id)) {
                $value = $this->_comment->updateById($request->id, $data);
            }
        } catch (\Exception $e) {
        }
        return redirect()->back();
    }

    public function downComment(Request $request){
        try{
            $com = Comment::find($request->id);
            $this->_comment->down($request->id);
        }catch (\Exception $e){

        }
        return back();
    }

    public function upComment(Request $request){
        try{
            $com = Comment::find($request->id);
            $this->_comment->up($request->id);
        }catch (\Exception $e){

        }
        return back();
    }

}