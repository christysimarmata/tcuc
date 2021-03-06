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

Route::post('login_action', 'LoginController@doLogin');

Route::get('/', 'LoginController@index');


Route::get('dashboard', function() {
	return view('dashboard');
});


Route::get('help', 'HelpController@showContact');
Route::post('changeHelp', 'SettingsController@changeHelp');

Route::get('logout', function() {
	session()->flush();

	return redirect('/');
});

Route::get('login2', function() {
	return view('login2');
});

Route::get('allcertification', 'LoginController@getAllCertification');

Route::post('allcertification', 'LoginController@updateByDate');

Route::get('allparticipant', 'LoginController@getAllParticipant');

Route::post('allparticipant', 'LoginController@updateParticipant');

Route::get('advancesearch', 'LoginController@advanceSearch');

Route::get('profile', 'ProfileController@showProfile');
Route::get('changepassword', 'ProfileController@changepassword');
Route::post('updatepassword', 'ProfileController@updatepassword');

Route::post('profile', 'ProfileController@updateAvatar');

Route::get('settings', 'SettingsController@index');
Route::post('changeinfo', 'SettingsController@changeinfo');
Route::post('createprogram', 'SettingsController@createprogram');
Route::post('deleteprogram', 'SettingsController@deleteprogram');
Route::post('createfamily', 'SettingsController@createfamily');
Route::post('deletefamily', 'SettingsController@deletefamily');
Route::post('createacademy', 'SettingsController@createacademy');
Route::post('deleteacademy', 'SettingsController@deleteacademy');
Route::get('createuser', 'SettingsController@indexuser');
Route::post('addusersingle', 'SettingsController@addusersingle');
Route::post('addusermultiple', 'SettingsController@addusermultiple');
Route::post('addcertificatemultiple', 'SettingsController@addcertificatemultiple');
Route::get('edithelp', 'SettingsController@edithelp');

Route::get('requestuser', 'SettingsController@requestUser');
Route::post('createRequest', 'SettingsController@createRequest');
Route::post('deleteRequest', 'SettingsController@deleteRequest');

Route::get('mycertification', 'MyCertificationController@showCertification');

Route::get('academy/{academy?}', 'MainController@show');
Route::post('academy/{academy?}', 'MainController@updateShow');
Route::get('details/{academy?}/{name?}', 'MainController@showDetails');



Route::get('profile_detail/{nik?}', 'ProfileController@showList');


Route::get('certificationlist', 'CertificateController@showList' );
Route::get('needclarification', 'CertificateController@showListClarification');
Route::get('clarificationfinal/{name?}', 'CertificateController@clarificationfinal');
Route::get('createSertificate', 'CertificateController@createNew');

Route::post('newcertificate','CertificateController@getParticipant');

Route::post('editItem', 'CertificateController@editItem');
Route::post('deleteItem', 'CertificateController@deleteItem');
Route::post('editItem2', 'CertificateController@editItem2');
Route::post('deleteItem2', 'CertificateController@deleteItem2');
Route::post('createItem2', 'CertificateController@createItem2');
Route::post('requestItem', 'CertificateController@requestItem');

Route::post('editClarification', 'CertificateController@editClarification');
Route::post('deleteClarification', 'CertificateController@deleteClarification');

Route::post('editCertification', 'CertificateController@editCertification');
Route::post('deleteCertification', 'CertificateController@deleteCertification');
Route::get('createnewfinal/{name?}','CertificateController@stepfinalcreate');

Route::post('deleteItemClarification', 'CertificateController@deleteItemClarification');
Route::post('editItemClarification', 'CertificateController@editItemClarification');
Route::post('draftForm', 'CertificateController@draftForm');
Route::post('submitForm', 'CertificateController@submitForm');

Route::post('submitFormClarification', 'CertificateController@submitFormClarification');
Route::post('draftFormClarification', 'CertificateController@draftFormClarification');

Route::post('draftFormNew', 'CertificateController@draftFormNew');
Route::post('submitFormNew', 'CertificateController@submitFormNew');

Route::get('validate', 'CertificateController@validateCertification');

Route::get('complete', 'CertificateController@complete');
Route::post('complete', 'CertificateController@updateComplete');

Route::post('validate', 'CertificateController@updateByDate');

Route::get('formValidation', 'CertificateController@formValidate');
Route::post('formValidation', 'CertificateController@uploadCertificate');

Route::post('editValidation', 'CertificateController@editValidation');
Route::post('deleteValidation', 'CertificateController@deleteValidation');
Route::post('commendtoSSO', 'CertificateController@commendtoSSO');
Route::post('draftLDE', 'CertificateController@draftLDE');

Route::post('submitComplete', 'CertificateController@submitComplete');



Route::get('reports', 'ReportsController@showReports');
Route::get('updatereports', 'ReportsController@updateReports');
Route::get('updatereportsyear', 'ReportsController@updateReportsYear');


