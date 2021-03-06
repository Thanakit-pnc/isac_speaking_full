<?php


Auth::routes();

Route::get('/logout_admin', 'Auth\LoginController@logout_admin')->name('logout.admin');

Route::get('/login-student', 'Auth\LoginStudentController@showLoginForm')->name('login.student');
Route::post('/login-student', 'Auth\LoginStudentController@login');
Route::get('/logout', 'Auth\LoginStudentController@logout')->name('logout.student');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect('/home');
});

Route::middleware('auth:student')->group(function () {
    Route::get('/', function() {
        return redirect('home');
    });
    Route::get('/home', 'HomeController@index')->name('home.student');

    // Route Part 1 && 3
    Route::get('part{part}/{set}', 'SpeakingController@part')->name('part');
    Route::post('upload_audio', 'SpeakingController@store')->name('store.audio');
    
    // Route Part 2
    Route::get('part2/topic{number}/intro', 'SpeakingPartTwoController@intro')->name('part2.intro');
    Route::get('part2/topic{number}/record', 'SpeakingPartTwoController@record')->name('part2.record');
    Route::post('part2/upload', 'SpeakingPartTwoController@store')->name('part2.upload');

    Route::get('/submit/{id}', 'SubmitController@index')->name('index.submit');
    Route::post('/submit', 'SubmitController@store')->name('store.submit');

    Route::get('status', 'StatusController@index')->name('status');
    Route::get('status_details/{id}', 'StatusController@details')->name('status.details');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::post('/select', 'Admin\DashboardController@update')->name('select.update');

    Route::get('/pending', 'Admin\PendingController@index')->name('pending');
    Route::get('/check/{id}', 'Admin\PendingController@check')->name('comment');
    Route::post('/store_comment', 'Admin\PendingController@store')->name('store.comment');

    Route::any('/completed', 'Admin\CompletedController@index')->name('completed');

    Route::get('/completed/{id}', 'Admin\CompletedController@view')->name('completed.view');

    Route::any('/reports', 'Admin\ReportController@index')->name('reports');

    Route::any('/reports-all', 'Admin\ReportAllController@index')->name('reports.all');
    Route::get('/report_view/{id}', 'Admin\CompletedController@view')->name('report_view');
});