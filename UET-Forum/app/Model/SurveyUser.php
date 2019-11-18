<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    protected $table = "survey_user";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function updateStatusBySurveyAndUserId($surveyId, $userId)
    {
        try {
            $surUser = SurveyUser::where('survey_id', $surveyId)->where('user_id', $userId)->get()->toArray();
            $srU = SurveyUser::find($surUser['0']['id']);
            if ($srU->status == 1) {
                $srU->status = 0;
                $srU->save();
                return true;
            }else{
                $srU->status = 1;
                $srU->save();
                return true;
            }

        } catch (\Exception $e) {
            dd($e);
        }
        return false;
    }
}