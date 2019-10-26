<?php


namespace App\Http\Controllers;


class BaseMessage extends \Illuminate\Routing\Controller
{



    /**
     * BaseMessage constructor.
     */
    public function __construct()
    {
    }

    function NotFound(){
        return view('messages.404');
    }


}