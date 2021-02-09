<?php


Auth::routes();

Route::get('/login-student', 'Auth\LoginStudentController@showLoginForm')->name('login.student');
Route::post('/login-student', 'Auth\LoginStudentController@login');
Route::get('/logout', 'Auth\LoginStudentController@logout')->name('logout.student');

Route::middleware('auth:student')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home.student');
});