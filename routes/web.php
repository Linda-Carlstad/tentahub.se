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

Auth::routes( [ 'verify' => true ] );

Route::get('/', function () {
    return view('welcome');
});

Route::get( 'kontakt', function()
{
    return view( 'contacts/info' );
} )->name( 'contacts.info' );

Route::get( 'support/kontakt', function()
{
    return view( 'contacts/support' );
} )->name( 'contacts.support' );


Route::post( '/contact', 'SendContactRequest' );

Route::get('/linda','FileUploadController@index');

Route::post('/linda', 'FileUploadController@showUploadFile');

Route::group( [ 'middleware' => 'verified' ], function()
{
    Route::get( 'profil/inställningar', 'UserController@edit' )->name( 'profile' );
    Route::match( [ 'put', 'patch' ], '/user/{id}', 'UserController@update' );

    Route::group( [ 'middleware' => 'valid_user' ], function()
    {
        Route::get( 'profil', 'UserController@index' )->name( 'dashboard' );

        Route::group( [ 'middleware' => [ 'moderator' ] ], function()
        {
            Route::resource( 'exam', 'ExamController' );
        } );

        Route::group( [ 'middleware' => [ 'admin' ] ], function()
        {
            Route::resource( 'users', 'UserController' )->only(
            [
                'create', 'store', 'show', 'destroy',
            ] );
            Route::resource( 'admins', 'AdminController' )->only(
            [
                'index',
            ] );

        } );

        Route::group( [ 'middleware' => [ 'super' ] ], function()
        {
            Route::get( 'supers', 'SuperController@index' );

            Route::resource( 'admins', 'AdminController' )->only(
            [
                'create', 'store', 'show', 'destroy',
            ] );
        } );
    } );
} );
