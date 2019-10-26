<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => '/', 'middleware' => 'beforeLogin'], function () {
    Route::get('', function () {
        return redirect()->route('login');
    });

    Route::get('/login', 'LoginController@formLogin')->name('login');
    Route::post('/login', ['middleware' => 'login', function (\Illuminate\Http\Request $request) {

        $loginC = new \App\Http\Controllers\LoginController();
        return $loginC->login();
    }]);
    Route::get('/signup', function () {
        return view('signup');
    })->name('sign-up');
});

Route::group(['prefix' => "uet-forum", 'middleware' => 'afterLogin'], function () {

    Route::get('/room-{id}', function ($id) {

        $roomControl = new \App\Http\Controllers\TableRoomController();
        try {
            $deC = decrypt($id);
        } catch (Exception $e) {
            return view('messages.404');
        }
        return $roomControl->showRoomById(decrypt($id));
    })->name('room');

    Route::get('/dashboard', 'DashBoardController@view')->name('dashboard');
    Route::get('/dashboard-search', function (\Illuminate\Http\Request $request){
        $dCon = new \App\Http\Controllers\DashBoardController();
        return $dCon->search($request);
    })->name('dashboard-search');


    Route::get('/room-join', function () {
        return view('roomjoin');
    })->name('room-join');

    Route::get('/logout', function () {
    })->middleware('logout')->name('logout');

    Route::get('/question-{id}', function ($id) {
        $q = new \App\Http\Controllers\QuestionController();
        return $q->showQuestion($id);
    })->name('question');

    Route::get('/profile','ProfileController@view')->name('profile');

});

Route::fallback('BaseMessage@Notfound');
