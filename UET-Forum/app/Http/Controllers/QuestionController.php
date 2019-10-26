<?php


namespace App\Http\Controllers;


use App\Model\Question;

class QuestionController extends \Illuminate\Routing\Controller
{

    private $_question;

    /**
     * QuestionController constructor.
     */
    public function __construct()
    {
        $this->_question = new Question();
    }

    public function showQuestion($id)
    {
        try {
            $d = \App\Model\Question::find($id)->toArray();
            $d = $this->_question->AddInfo(['0' => $d])['0'];
            $comment = $this->_question->getCommentByQuestionId($id);
        }catch (\Exception $e){
            return view('messages.404');
        }
        return view('question',['question'=>$d,'comments'=>$comment]);
    }

}