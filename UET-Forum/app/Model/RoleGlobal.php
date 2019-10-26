<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleGlobal extends Model
{

    protected $table = "roleglobal";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\Model\User', 'role_id', 'id');
    }

    public function functionGlobal(){
        return $this->hasMany('App\Model\FunctionGlobal','role_id','id');
    }

    public function WebFunction(){
        return $this->belongsToMany('App\Model\WebFunction','FunctionGlobal','role_id','function_id');
    }
}