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

    Route::post('/post-user', 'ProfileController@insert')->name('post-user');

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

    Route::post('/room-pass', function (\Illuminate\Http\Request $request) {
        return \App\Http\Controllers\TableRoomController::checkPass($request);
    })->name('check-pass');

    Route::get('/dashboard', 'DashBoardController@view')->name('dashboard');
    Route::get('/dashboard-search', function (\Illuminate\Http\Request $request) {
        $dCon = new \App\Http\Controllers\DashBoardController();
        return $dCon->search($request);
    })->name('dashboard-search');


    Route::post('/post-question', function (\Illuminate\Http\Request $request) {
        $roomC = new \App\Http\Controllers\TableRoomController();
        return $roomC->postQuestion($request);
    })->name('post-question');

    Route::post('/post-comment', function (\Illuminate\Http\Request $request) {
        $questionC = new \App\Http\Controllers\QuestionController();
        return $questionC->postComment($request);
    })->name('post-comment');

    Route::post('/post-room', function (\Illuminate\Http\Request $request) {
        $roomC = new \App\Http\Controllers\TableRoomController();
        return $roomC->postRoom($request);
    })->name('post-room');


    Route::get('/room-join', function () {
        return view('roomjoin');
    })->name('room-join');


    Route::get('/logout', function () {
    })->middleware('logout')->name('logout');

    Route::get('/question-{id}', function ($id) {
        $q = new \App\Http\Controllers\QuestionController();
        return $q->showQuestion($id);
    })->name('question');


    Route::get('/profile', 'ProfileController@view')->name('profile');

    Route::post('/delete-room', 'TableRoomController@deleteRoom')->name('delete-room');

    Route::post('/update-room', 'TableRoomController@updateRoom')->name('update-room');

    Route::post('/update-user', 'ProfileController@updateUser')->name('update-user');

    Route::post('/delete-comment', 'CommentController@deleteById')->name('delete-comment');

    Route::post('/update-comment', 'CommentController@updateComment')->name('update-comment');

    Route::post('/delete-question', 'QuestionController@deleteById')->name('delete-question');

    Route::post('/down', 'CommentController@downComment')->name('down');

    Route::post('/up', 'CommentController@upComment')->name('up');

    Route::get('/survey-list','SurveyController@show')->name('survey-list');

    Route::post('/survey-post','SurveyController@postSurvey')->name('survey-post');

    Route::post('/survey-answer','AnswerController@postAnswer')->name('answer-post');

    Route::get('/survey-{id}','SurveyController@surveyJoin')->name('survey-join');
});

Route::fallback('BaseMessage@Notfound');
