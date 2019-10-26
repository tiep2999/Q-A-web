<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class FunctionGlobal extends Model
{
    protected $table = "functionGlobal";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function functional(){
        return $this->hasMany('App\Model\WebFunction','id','function_id');
    }

    public function roleGlobal(){
        return $this->hasMany('App\Model\RoleGlobal','id','role_id');
    }
}