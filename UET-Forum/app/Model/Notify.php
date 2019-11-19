<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $table = "notify";
    protected $primaryKey = "id";
    public $timestamps = false;

    static function getAll(){
        $all = Notify::all()->toArray();
        return $all;
    }

}