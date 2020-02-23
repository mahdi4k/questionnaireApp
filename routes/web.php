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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionnaires/create','QuestionaireController@create');
Route::post('/questionnaires','QuestionaireController@store');
Route::get('/questionnaires/{questionnaire}','QuestionaireController@show');

Route::get('/questionnaires/{questionnaire}/questions/create','QuestionController@create');
Route::get('/questionnaires/{questionnaire}/questions','QuestionController@store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}','QuestionController@destroy');
Route::delete('/questionnaires/{questionnaire}/questions/','HomeController@destroy');
 Route::get('/surveys/{questionnaire}-{slug}','SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}','SurveyController@store');
