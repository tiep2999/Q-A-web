<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class WebFunction extends Model
{
    protected $table = "function";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function roleRoom(){
        return $this->belongsToMany('App\Model\RoleRoom','functionRoom','function_id','role_id');
    }

    public function roleGlobal(){
        return $this->belongsToMany('App\Model\RoleGlobal','functionGlobal','function_id','role_id');
    }
}