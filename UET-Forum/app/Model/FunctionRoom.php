<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class FunctionRoom extends Model
{
    protected $table = "functionRoom";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function functional(){
        return $this->hasMany('App\Model\WebFunction','id','function_id');
    }

    public function roleRoom(){
        return $this->hasMany('App\Model\RoleRoom','id','role_id');
    }
}