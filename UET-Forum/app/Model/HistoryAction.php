<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HistoryAction extends Model
{
    protected $table = "historyAction";
    protected $primaryKey = "id";
    public $timestamps = false;

    /* begin::--------------------------------------
     * @return obj of eloquent
     */
    public function user(){
        return $this->hasMany('App\Model\User','id','user_id');
    }

    public function room(){
        return $this->hasMany('App\Model\Room','id','room_id');
    }

    public function question(){
        return $this->hasMany('App\Model\Question','id','question_id');
    }

    public function webFunction(){
        return $this->hasMany('App\Model\WebFunction','id','action');
    }

    public function getByUserId($id){
        return $this->getHistoryByFieldId($id,'user_id');
    }

    public function getByRoomId($id){
        return $this->getHistoryByFieldId($id,'room_id');
    }

    public function getByQuestionId($id){
        return $this->getHistoryByFieldId($id,'question_id');
    }

    public function getByAction($id){
        return $this->getHistoryByFieldId($id,'action');
    }
    /*
     * end:: obj eloquent
     *--------------------------------------------
     * start:: array
     * @return data array
     *-----------------
     */

    /*
     * @Param
     *   $Value id of user
     *   $field: field of table in database
     * @Return Array of history obj
     */
    public function getHistoryByFieldId($value,string $field='user_id'){
        $history = HistoryAction::where($field,$value)->orderBy('created','desc')->get();
        if(!empty($history)){
            foreach ($history as $item){
                $tempU = HistoryAction::find($item->user_id)->user;
                $item['user_id'] = $tempU['0']->only('id','fullName','email','dateOfBirth');

                $tempR = HistoryAction::find($item->room_id)->room;
                $item['room_id'] = $tempR['0']->toArray();

                $tempQ = HistoryAction::find($item->question_id)->question;
                $item['question_id'] = $tempQ['0']->toArray();

                $tempA = HistoryAction::find($item->action)->webFunction;
                $item['action'] = $tempA['0']->toArray();
            }
        }
        return $history->toArray();
    }

    /*
     * Get all data array of history by history obj
     * @Param $history: array obj eloquent of HistoryAction
     * @Return obj history convert to array
     */
    public function getAllByObj($history){
        if(!empty($history)){
            foreach ($history as $item){
                $tempU = HistoryAction::find($item->user_id)->user;
                $item['user_id'] = $tempU['0']->only('id','fullName','email','dateOfBirth');

                $tempR = HistoryAction::find($item->room_id)->room;
                $item['room_id'] = $tempR['0']->toArray();

                $tempQ = HistoryAction::find($item->question_id)->question;
                $item['question_id'] = $tempQ['0']->toArray();

                $tempA = HistoryAction::find($item->action)->webFunction;
                $item['action'] = $tempA['0']->toArray();
            }
        }
        return $history;
    }

/*
 * @Param array of history obj( user_id, room_id, question_id, action)
 * @Return array constant:
 *  all Data obj history to array
 *  Condition is value input
 */
    public function searchByCondition($array=[])
    {
        $u = new HistoryAction();
        $data = $u->newQuery();
        if (!empty($array['user_id'])) {
            $data->where('user_id', 'like', $array['user_id']);
        }
        if (!empty($array['room_id'])) {
            $data->where('room_id', 'like', $array['room_id']);
        }
        if (!empty($array['question_id'])) {
            $data->where('question_id', 'like', $array['question_id']);
        }
        if (!empty($array['action'])) {
            $data->where('action', 'like', $array['action']);
        }

        $da = $this->getAllByObj($data->get());
        return ['data'=>$da->toArray(),'condition'=>$array];
    }

}