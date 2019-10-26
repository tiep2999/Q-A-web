<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class StatusRoom extends Model
{
    protected $table = "statusRoom";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function room(){
        return $this->hasMany('App\Model\Room','status_id');
    }
}