<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.index');
});

Auth::routes([

'register'=>false,
'reset'=>false,
'verify'=>false

]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/quiz/{quiz_id}/','ExamController@getQuizQuestion')->name('quiz_question')->middleware('auth');

Route::post('user/quiz/create','ExamController@postQuiz')->middleware('auth');
Route::get('/result/user/{user_id}/quiz/{quiz_id}','ExamController@viewResult')->name('result')->middleware('auth');

Route::get('/user/{user_id}/profile/','HomeController@profileData')->name('profile')->middleware('auth');
Route::get('/result/user/{user_id}/quiz/{quiz_id}','ExamController@viewResult')->name('result')->middleware('auth');

Route::group(['middleware'=>'isAdmin'],function(){

 Route::resource('quiz', 'QuizController');
 Route::resource('question', 'QuestionController');
 Route::get('quiz/{id}/questions','QuizController@questions')->name('quiz.question');
 Route::get('exam/assign','ExamController@create')->name('exam.assign');
 Route::get('exam/','ExamController@index')->name('exam.all');
 Route::post('exam/store','ExamController@store')->name('exam.store');
 Route::post('exam/delete/','ExamController@removeExam')->name('exam.delete');

 Route::get('exam/user/result','ExamController@viewUserResult')->name('results');

 Route::get('result/quiz/{quiz_id}/{user_id}','ExamController@userQuizes')->name('quiz_question_user');

  Route::get('/',function(){
  	 return view('admin.index');
  })->name('dashboard');

 Route::resource('user', 'UserController');

});

 


//Auth::routes();
