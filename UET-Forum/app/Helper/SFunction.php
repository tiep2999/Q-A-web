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

    static function checkValiPass($request){
        if(isset($request->password_new)&&isset($request->password_vali)){
            return ($request->password_new==$request->password_vali)? true : false;
        }
        return 'NO_PASS';
    }
}