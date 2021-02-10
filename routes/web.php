<?php


Auth::routes();

Route::get('/login-student', 'Auth\LoginStudentController@showLoginForm')->name('login.student');
Route::post('/login-student', 'Auth\LoginStudentController@login');
Route::get('/logout', 'Auth\LoginStudentController@logout')->name('logout.student');

Route::middleware('auth:student')->group(function () {
    Route::get('/', function() {
        return redirect('home');
    });
    Route::get('/home', 'HomeController@index')->name('home.student');

    Route::get('full-test/{test}', 'SpeakingController@full_test')->name('full.test');

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function() {
    Route::get('/', 'Admin\DashboardController@index');
});