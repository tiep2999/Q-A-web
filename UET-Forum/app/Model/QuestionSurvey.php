<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class QuestionSurvey extends Model
{
    protected $table = "questionSurvey";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function answer(){
        return $this->hasMany('App\Model\Answer','question_id','id');
    }

    public function getAllInfoQuestionBySurveyId($id){
        try{
            $ques = QuestionSurvey::where('survey_id',$id)->get();
            $ques = $this->addInfoQuestion($ques);
            return $ques;
        }catch (\Exception $e){
            dd($e);
        }
        return null;
    }

    /*
     * add information to list question survey
     * @param array question be converted from elequent obj
     * @return array list question
     */
    public function addInfoQuestion($questions){
        foreach ($questions as $key=>$value){
            $ans = new Answer();
            $questions[$key]['answer'] = $ans->getByQuestionId($questions[$key]['id']);
        }
        return $questions;
    }

    public function getQuestionBySurveyId($id){
        try{
            $ques = QuestionSurvey::where('survey_id',$id)->get()->toArray();
            return $ques;
        }catch (\Exception $e){
            dd($e);
        }
        return null;
    }
}