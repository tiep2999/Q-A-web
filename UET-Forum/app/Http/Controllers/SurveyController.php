<?php


namespace App\Http\Controllers;


use App\Model\Survey;
use App\Model\SurveyUser;
use Illuminate\Http\Request;

class SurveyController extends \Illuminate\Routing\Controller
{


    private $_survey;
    /**
     * SurveyController constructor.
     */
    public function __construct()
    {
        $this->_survey = new Survey();
    }

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
            if (!empty($survey1->toArray())) {
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

    public function postSurvey(Request $request)
    {
        $this->_survey->insertSurvey($request->toArray());
        return redirect()->back();
    }

    public function surveyAnswer(Request $request)
    {
        return null;
    }

    public function deleteById(Request $request){
        $this->_survey->deleteSurveyById($request->id);
        return redirect()->route('survey-list');
    }
}