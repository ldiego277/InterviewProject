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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Nuevo', 'NuevoController@direct')->name('nuevo');

Route::group(array('before' => 'auth'), function ()
{
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\LfmController@upload');

});

Route::post('/insert', 'NuevoController@InsertDocument')->name('insert');

Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'Editcontroller@index']);

Route::post('/update', 'EditController@update') -> name('update');

Route::get('pdf/{id}', ['as' => 'pdf', 'uses' => 'PDFcontroller@index']);

Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'deleteDocController@index']);

Route::post('/deletedoc', 'deleteDocController@deletedoc') -> name('delete');


