<?php


namespace App\Http\Controllers;


use App\Helper\Validation;
use App\Model\Answer;
use App\Model\QuestionSurvey;
use App\Model\Survey;
use App\Model\SurveyUser;
use Illuminate\Http\Request;

class AnswerController extends \Illuminate\Routing\Controller
{

    private $_ans;

    /**
     * AnswerController constructor.
     */
    public function __construct()
    {
        $this->_ans = new Answer();
    }

    public function postAnswer(Request $request)
    {
        $data = $request->toArray();
        $q = new QuestionSurvey();
        if (Validation::answerValidation($request->id, $request->toArray())) {
            foreach ($data as $key => $value) {
                try {
                    $que = QuestionSurvey::find($key);
                    if (isset($que)) {
                        if ($que->type_id == 1 | $que->type_id == 2) {
                            $this->_ans->updateAnswerAQ(['id' => $value]);
                        } else {
                            $this->_ans->insertContentAnswer(['question_id' => $key, 'content' => $value]);
                        }
                    }
                } catch (\Exception $e) {

                }

            }
            $sU = new SurveyUser();
            if ($sU->updateStatusBySurveyAndUserId($request->id, decrypt($_COOKIE['id']))) {
                return redirect()->route('survey-list');
            }
        }
        return redirect()->back();
    }

}