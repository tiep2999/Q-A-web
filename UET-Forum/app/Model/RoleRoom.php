<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class RoleRoom extends Model
{
    protected $table = "roleRoom";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\Model\User', 'role_id', 'id');
    }

    public function functionRoom(){
        return $this->hasMany('App\Model\FunctionRoom','role_id','id');
    }

    public function WebFunction(){
        return $this->belongsToMany('App\Model\WebFunction','FunctionRoom','role_id','function_id');
    }
}