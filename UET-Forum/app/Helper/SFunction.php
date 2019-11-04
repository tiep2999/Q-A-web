<?php


namespace App\Helper;




use Illuminate\Support\Facades\Hash;

class SFunction
{

    static function checkPass($pass,$masterPass='',$type='md5'){

        $hPass = md5($pass);
        if($masterPass==$hPass){
            return true;
        }
        return false;
    }
}