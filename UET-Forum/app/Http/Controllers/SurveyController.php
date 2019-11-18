<?php


namespace App\Http\Controllers;


use App\Model\Survey;
use App\Model\SurveyUser;
use Illuminate\Http\Request;

class SurveyController extends \Illuminate\Routing\Controller
{
    public function show()
    {
        $sur = new Survey();
        $surveys = $sur->getAllSurveyByUserId(decrypt($_COOKIE['id']));
        return CoreController::viewPage('surveyList', ['surveys' => $surveys]);
    }

    public function surveyJoin(Request $request)
    {
        try {
            $survey1 = SurveyUser::where('survey_id', $request->id)->where('status', 0)->get();
            if (!empty($survey1)) {
                $sur = new Survey();
                $surveys = $sur->getSurveyById($request->id);
                return CoreController::viewPage('survey', ['survey' => $surveys['0']]);
            } else {
                return redirect()->route('survey-list');
            }
        } catch (\Exception $e) {
            return redirect()->route('survey-list');
        }

    }

    public function surveyPost(Request $request)
    {

        return null;
    }

    public function surveyAnswer(Request $request)
    {
        return null;
    }
}