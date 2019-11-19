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

    public function deleteById(Request $request)
    {
        $this->_survey->deleteSurveyById($request->id);
        return redirect()->route('survey-list');
    }

    public function getMySurvey(Request $request)
    {
        $surveys = null;
        $sur = new Survey();
        if(isset($request->died)){
            $surveys = $sur->getAllSurveyByAdminId(decrypt($_COOKIE['id']),['died'=>true]);
            return CoreController::viewPage('surveyList', ['surveys' => $surveys, 'admin' => 1,'cons'=>['died'=>1]]);
        }elseif (isset($request->live)){
            $surveys = $sur->getAllSurveyByAdminId(decrypt($_COOKIE['id']),['live'=>true]);
            return CoreController::viewPage('surveyList', ['surveys' => $surveys, 'admin' => 1,'cons'=>['live'=>1]]);
        }else{
            $surveys = $sur->getAllSurveyByAdminId(decrypt($_COOKIE['id']));
        }

        return CoreController::viewPage('surveyList', ['surveys' => $surveys, 'admin' => 1]);
    }

    public function adminSurveyJoin(Request $request)
    {
        try {
            $survey1 = SurveyUser::where('survey_id', $request->id)->get();
            if (!empty($survey1->toArray())) {
                $survey1 = $survey1->toArray();
                if ($survey1['0']['status'] == 2) {
                    $sur = new Survey();
                    $surveys = $sur->getSurveyById($request->id,true);
                } else {
                    $sur = new Survey();
                    $surveys = $sur->getSurveyById($request->id);
                }
                return CoreController::viewPage('survey', ['survey' => $surveys['0']]);
            } else {
                return redirect()->route('survey-list');
            }
        } catch (\Exception $e) {
            return redirect()->route('survey-list');
        }

    }
}