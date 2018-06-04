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
Route::group(['middleware' => ['auth']], function () {
	Route::resource('questions', 'QuestionController',[
	    'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
	    'names' => ['index' => 'question_link','create' => 'create_question_path', 'store' => 'question_store', 'edit' => 'question_edit', 'update' => 'question_update']
	]);
});

// Route::group([ 'prefix' => 'question' ],  function() {

    // Route::get('/', ['as' => 'questions', 'uses' => 'QuestionController@index']);
    // Route::get('/add', ['as' => 'questions.create', 'uses' => 'QuestionController@create']);
    // Route::post('/', ['as' => 'questions.store', 'uses' => 'QuestionController@store']);
    // Route::get('/{article}', ['as' => 'articles.show', 'uses' => 'ArticleController@show']);
    // Route::post('/{article}', ['as' => 'articles.update', 'uses' => 'ArticleController@update']);
    // Route::delete('/{article}', ['as' => 'articles.destroy', 'uses' => 'ArticleController@destroy']);
// });


Route::get('/home', 'HomeController@index')->name('home');
