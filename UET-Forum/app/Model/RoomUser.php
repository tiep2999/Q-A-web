<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    protected $table = "room_user";
    protected $primaryKey = "id";
    public $timestamps = false;
}