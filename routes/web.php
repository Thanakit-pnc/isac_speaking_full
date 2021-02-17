<?php


Auth::routes();

Route::get('/logout_admin', 'Auth\LoginController@logout_admin')->name('logout.admin');

Route::get('/login-student', 'Auth\LoginStudentController@showLoginForm')->name('login.student');
Route::post('/login-student', 'Auth\LoginStudentController@login');
Route::get('/logout', 'Auth\LoginStudentController@logout')->name('logout.student');

Route::middleware('auth:student')->group(function () {
    Route::get('/', function() {
        return redirect('home');
    });
    Route::get('/home', 'HomeController@index')->name('home.student');

    Route::get('part{part}/{topic}', 'SpeakingController@part')->name('part1');

    Route::post('upload_audio', 'SpeakingController@store')->name('store.audio');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::post('/select', 'Admin\DashboardController@update')->name('select.update');

    Route::get('/pending', 'Admin\PendingController@index')->name('pending');
    Route::get('/check/{id}', 'Admin\PendingController@check')->name('comment');
    Route::post('/store_comment', 'Admin\PendingController@store')->name('store.comment');

    Route::get('/completed', 'Admin\CompletedController@index')->name('completed');

    Route::get('/completed/{id}', 'Admin\CompletedController@view')->name('completed.view');
});