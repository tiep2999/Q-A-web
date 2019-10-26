<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function room(){
        return $this->hasMany('App\Model\Room','category_id');
    }
}