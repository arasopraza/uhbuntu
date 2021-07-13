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

Route::get('/', 'PagesController@index')->name('index');
Route::get('/upvote', 'PagesController@upvote')->name('upvote');
Route::get('/downvote', 'PagesController@downvote')->name('downvote');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/questions/{question}', 'QuestionsController@show')->name('question');

Route::prefix('/reset-password')->group(function () {
    Route::get('/', function(){
        return view('auth.reset_password');
    })->name('reset_password');
    Route::post('/confirm', 'UserController@resetPassword')->name('confirm_reset');
});

Route::post('/user/register', 'UserController@store')->name('user_register');


Route::middleware(['web', 'auth'])->group(function () {
    Route::patch('/profile/update/{id}', 'UserController@update')->name('update_profile');

    Route::prefix('/question')->group(function () {
        Route::post('/store', 'QuestionsController@store')->name('store_question');
        Route::patch('/update/{id}', 'QuestionsController@update')->name('update_question');
        Route::delete('/destroy/{id}', 'QuestionsController@destroy')->name('destroy_question');
    });

    Route::prefix('/answer')->group(function(){
        Route::post('/store', 'AnswerController@store')->name('store_answer');
        Route::patch('/update/{id}', 'AnswerController@update')->name('update_answer');
        Route::delete('/destroy/{id}', 'AnswerController@destroy')->name('destroy_answer');
    });
    Route::prefix('/vote')->group(function () {
        Route::post('/upvote/{id}', 'VoteController@upvote')->name('update_upvote');
        Route::post('/downvote/{id}', 'VoteController@downvote')->name('update_downvote');
    });
});
