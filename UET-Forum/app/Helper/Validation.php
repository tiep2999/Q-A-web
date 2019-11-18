<?php


namespace App\Helper;


use App\Model\QuestionSurvey;

class Validation
{

    /*
     * @param   $surveyId is survey's id
     *          $data has form ['<id of question>'=>'<value>']
     */
    static function answerValidation($surveyId, $data)
    {
        $ques = new QuestionSurvey();
        $dataQues = $ques->getQuestionBySurveyId($surveyId);
        foreach ($dataQues as $key => $value) {
            if (!isset($data[$value['id']])) {
                return false;
            }
        }
        return true;
    }
}