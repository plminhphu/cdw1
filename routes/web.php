<?php

Auth::routes();
Route::get('/', 'HomeController@getHome')->name('home');
Route::get('/home', [
    'as' => 'getHome',
    'uses' => 'HomeController@getHome'
]);
Route::post('/home', [
    'as' => 'postHome',
    'uses' => 'HomeController@postHome'
]);
Route::get('/flight-list', [
    'as' => 'getFlightList',
    'uses' => 'HomeController@getFlightList'
]);
Route::get('/flight-detail-{id}', [
    'as' => 'getFlightDetail',
    'uses' => 'HomeController@getFlightDetail'
]);
Route::get('/flight-detail-{id}', [
    'as' => 'getFlightDetail',
    'uses' => 'HomeController@getFlightDetail'
]);
Route::get('/flight-checked-{id}', [
    'as' => 'getFlightChecked',
    'uses' => 'HomeController@getFlightChecked'
]);
Route::get('/flight-book', [
    'as' => 'getFlightBook',
    'uses' => 'HomeController@getFlightBook'
]);
Route::post('/flight-book', [
    'as' => 'postFlightBook',
    'uses' => 'HomeController@postFlightBook'
]);
Route::get('/profile', [
    'as' => 'getProfile',
    'uses' => 'HomeController@getProfile'
]);
Route::post('/profile', [
    'as' => 'postProfile',
    'uses' => 'HomeController@postProfile'
]);
Route::get('/flights', [
    'as' => 'getFlights',
    'uses' => 'HomeController@getFlights'
]);
Route::get('/detail-booking-{id}', [
    'as' => 'getFlightDetailBooking',
    'uses' => 'HomeController@getFlightDetailBooking'
]);
Route::get('/cancle-booking-{id}', [
    'as' => 'getCancleBooking',
    'uses' => 'HomeController@getCancleBooking'
]);
Route::get('/edit-passenger-{id}', [
    'as' => 'getEditPassenger',
    'uses' => 'HomeController@getEditPassenger'
]);
Route::post('/edit-passenger', [
    'as' => 'postEditPassenger',
    'uses' => 'HomeController@postEditPassenger'
]);