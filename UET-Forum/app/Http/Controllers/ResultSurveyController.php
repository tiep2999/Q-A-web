<?php


namespace App\Http\Controllers;


use App\Model\Survey;
use App\Model\SurveyUser;
use Illuminate\Http\Request;

class ResultSurveyController extends \Illuminate\Routing\Controller
{
    private $_survey;

    /**
     * ResultSurveyController constructor.
     * @param $_survey
     */
    public function __construct()
    {
        $this->_survey = new Survey();
    }

    public function showById(Request $request){
       $data =  $this->_survey->getResultBySurveyId($request->id);
        return CoreController::viewPage('resultSurvey',['data'=>$data]);
    }

}