<?php


namespace App\Helper;


use Illuminate\Support\Facades\Hash;

class SFunction
{

    /*
     * @Param $pass: normal string input, $masterPass is md5 string
     */
    static function checkPass($pass, $masterPass = '', $type = 'md5')
    {

        $hPass = md5($pass);
        if ($masterPass == $hPass) {
            return true;
        }
        return false;
    }

    /*
     * target check 2 password when change
     * @Param $request: must be obj request
     */
    static function checkValiPass($request)
    {
        if (isset($request->password_new) && isset($request->password_vali)) {
            return ($request->password_new == $request->password_vali) ? true : false;
        }
        return 'NO_PASS';
    }

    static function upFile($request){
        try {
            $file = $request->avatar;
            $name = $file->getClientOriginalName();
            $name = time() . bin2hex(openssl_random_pseudo_bytes(2)) . $name;
            $file->move(config('app.pathFile'), $name);
        } catch (\Exception $e) {
            dd($e);
            return '';
        }
        return "avatar/" . $name;
    }
}