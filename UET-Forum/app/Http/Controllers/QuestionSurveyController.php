<?php


namespace App\Http\Controllers;


use App\Model\Answer;
use App\Model\QuestionSurvey;
use Illuminate\Http\Request;

class QuestionSurveyController extends \Illuminate\Routing\Controller
{
    private $_question;
    private $_answer;

    /**
     * QuestionSurveyController constructor.
     * @param $_question
     * @param $_answer
     */
    public function __construct()
    {
        $this->_question = new QuestionSurvey();
        $this->_answer = new Answer();
    }

    public function postQuestionSurvey(Request $request)
    {
        $ques = $request->toArray();
        if (isset($request->question) && !empty($ques['answer']['0']) && !empty($ques['answer']['1'])) {
            $bol = $this->_question->insertQuestion(['content' => $request->question, 'survey_id' => $request->survey_id, 'type_id' => $request->type_id]);
            if($bol!=false){
                foreach ($ques['answer'] as $key=>$v){
                    if(!empty($v)){
                        $this->_answer->insertNewAnswer(['content'=>$v,'question_id'=>$bol['id']]);
                    }

                }
            }
        }else{
            $bol = $this->_question->insertQuestion(['content' => $request->question, 'survey_id' => $request->survey_id, 'type_id' => $request->type_id]);
        }
        return back();
    }

    public function postAnswerQuestion($data)
    {

    }

}