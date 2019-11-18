<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answer";
    protected $primaryKey = "id";
    public $timestamps = false;

    /*
     * @return array answers
     */
    public function getByQuestionId($id)
    {
        try {
            $value = Answer::where('question_id', $id)->get()->toArray();
            return $value;
        } catch (\Exception $e) {
            dd($e);
        }
        return null;
    }

    /*
     * @param $data must be array
     */
    public function insertContentAnswer($data)
    {
        if (isset($data['question_id']) && isset($data['content'])) {
            try {
                $answer = new Answer();
                $answer->question_id = $data['question_id'];
                $answer->content = $data['content'];
                $answer->amount = 1;
                $answer->save();
                return true;
            } catch (\Exception $e) {
                dd($e);
            }

        }
        return false;

    }

    public function updateAnswerAQ($data)
    {
        try {
            $ans = Answer::find($data['id']);
            $ans->amount = $ans->amount+1;
            $ans->save();
            return true;
        } catch (\Exception $e) {
            dd($e);

        }
        return false;
    }

}