<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    protected $table = "survey";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function question(){
        return $this->hasMany('App\Model\QuestionSurvey','survey_id','id');
    }
    /*
     * @param $id: id of user
     * return array survey not finished by id user
     */
    public function getAllSurveyByUserId($id)
    {
        try {
            $survey = User::find(1)->survey->toArray();
            return $this->addInfor($survey);
        } catch (\Exception $e) {
            dd($e);
        }
        return null;
    }

    /*
     * add information to obj survey
     * @param $surveys is array that converted from obj eloquent
     * @return array survey
     */
    public function addInfor($surveys)
    {
        foreach ($surveys as $key => $value) {
            $u = new User();
            $q = new QuestionSurvey();
            $value['admin'] = $u->getUserById($value['admin'])->toArray();
            $surveys[$key]['admin'] = $value['admin'];
            $surveys[$key]['question'] = $q->getAllInfoQuestionBySurveyId($surveys[$key]['id'])->toArray();
        }
        return $surveys;
    }

    public function getSurveyById($id)
    {
        try {
            $sur = Survey::find($id);
            $sur = $this->addInfor([$sur->toArray()]);
            return $sur;
        } catch (\Exception $e) {
            return null;
        }
    }


}