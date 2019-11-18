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
            $survey = User::find($id)->survey->toArray();
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

    public function insertSurvey($data){
        $sur = new Survey();
        try {
            if (isset($data['nameSur']) && isset($data['describeSur'])) {
                $sur->name = $data['nameSur'];
                $sur->descibe = $data['describeSur'];
                $sur->created = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
                $sur->admin = decrypt($_COOKIE['id']);
                $sur->save();
                $surAfter = Survey::where('name', $data['nameSur'])->where('descibe', $data['describeSur'])->get()->toArray();
                $users = User::all()->toArray();
                foreach ($users as $user) {
                    $sU = new SurveyUser();
                    $sU->user_id = $user['id'];
                    $sU->survey_id = $surAfter['0']['id'];
                    $sU->updated = date('Y-m-d H:i:s', time() + 7 * 60 * 60);
                    $sU->status = 0;
                    $sU->save();

                }
            }
            return true;
        }catch (\Exception $e){
            dd($e);
        }

        return false;
    }

    public function deleteSurveyById($id){
        try{
            $sur = Survey::find($id);
            SurveyUser::whereIn('survey_id',[$id])->update(['status'=>2]);
        }catch (\Exception $e){
            dd($e);
        }
        return false;

    }

    /*
     *
     */
    public function getResultBySurveyId($id){
        $ques = new QuestionSurvey();
        $sur = $this->getSurveyById($id);
        return $sur['0'];
    }


}