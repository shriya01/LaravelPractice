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
//Google Map Routes
Route::get('googlemap', 'MapController@map');
Route::get('googlemap/direction', 'MapController@direction');

//DataTable Routes
Route::get('my-datatables', 'MyDatatablesController@index');
Route::get('get-data-my-datatables', ['as'=>'get.data','uses'=>'MyDatatablesController@getData']);

//Progress Bar Upload Routes
Route::get('file-upload', 'FileController@fileUpload');
Route::post('file-upload', 'FileController@fileUploadPost')->name('fileUploadPost');

//JQuery Form Validation Demo Routes
Route::resource('forms','FormController');

//export to excel
Route::get('importExport', 'MaatwebsiteDemoController@importExport');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');

Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');
Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

//like 
    Route::post('/chirps/{id}/act', 'HomeController@actOnChirp');