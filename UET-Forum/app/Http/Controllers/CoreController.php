<?php


namespace App\Http\Controllers;


use App\Model\Category;

class CoreController extends \Illuminate\Routing\Controller
{

    public function showLogin(){

        return view('login');
    }

    public static function DataCore(){
        $data = Category::all()->toArray();

        return $data;

    }

}