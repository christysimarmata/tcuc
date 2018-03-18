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
Route::get('dashboardsso', function () {
    return view('layout/dashboardsso');
});
Route::get('dashboarduser', function () {
    return view('layout/dashboarduser');
});
Route::get('dashboardpnc', function () {
    return view('layout/dashboardpnc');
});
Route::get('dashboardlde', function () {
    return view('layout/dashboardlde');
});
Route::get('dashboardnonlde', function () {
    return view('layout/dashboardnonlde');
});
Route::get('dashboardadmin', function () {
    return view('layout/dashboardadmin');
});

Route::get('dashboard', function() {
	return view('dashboard');
});
Route::get('login', function() {
	return view('login');
});

Route::get('help', 'HelpController@showContact');

Route::get('logout', function() {
	session()->flush();

	return redirect('login');
});



Route::get('profile', 'ProfileController@showProfile');

Route::post('profile', 'ProfileController@updateAvatar');

Route::get('mycertification', 'MyCertificationController@showCertification');


Route::get('NITScer', 'NitsController@showList');
Route::get('Consumercer', 'ConsumerController@showList');
Route::get('Businesscer', 'BusinessController@showList');
Route::get('DISPcer', 'DispController@showList');
Route::get('Leadershipcer', 'LeadershipController@showList');
Route::get('Enterprisecer', 'EnterpriseController@showList');
Route::get('Mobilecer', 'MobileController@showList');
Route::get('WINScer', 'WinsController@showList');

Route::post('NITScer', 'NitsController@updateList');
Route::post('Consumercer', 'ConsumerController@updateList');
Route::post('Businesscer', 'BusinessController@updateList');
Route::post('DISPcer', 'DispController@updateList');
Route::post('Leadershipcer', 'LeadershipController@updateList');
Route::post('Enterprisecer', 'EnterpriseController@updateList');
Route::post('Mobilecer', 'MobileController@updateList');
Route::post('WINScer', 'WinsController@updateList');

Route::get('NITScer/{name?}', 'NitsController@showCertificate');
Route::get('Consumercer/{name?}', 'ConsumerController@showCertificate');
Route::get('Businesscer/{name?}', 'BusinessController@showCertificate');
Route::get('DISPcer/{name?}', 'DispController@showCertificate');
Route::get('Leadershipcer/{name?}', 'LeadershipController@showCertificate');
Route::get('Enterprisecer/{name?}', 'EnterpriseController@showCertificate');
Route::get('Mobilecer/{name?}', 'MobileController@showCertificate');
Route::get('WINScer/{name?}', 'WinsController@showCertificate');


Route::get('profile_detail/{nik?}', 'ProfileController@showList');


Route::get('certificationlist', 'CertificateController@showList' );
Route::get('needclarification', 'CertificateController@showListClarification');
Route::get('clarificationfinal/{name?}', 'CertificateController@clarificationfinal');
Route::get('createSertificate', 'CertificateController@createNew');

Route::post('newcertificate','CertificateController@getParticipant');

Route::post('editItem', 'CertificateController@editItem');
Route::post('deleteItem', 'CertificateController@deleteItem');

Route::post('editClarification', 'CertificateController@editClarification');
Route::post('deleteClarification', 'CertificateController@deleteClarification');

Route::post('deleteItemClarification', 'CertificateController@deleteItemClarification');
Route::post('editItemClarification', 'CertificateController@editItemClarification');
Route::post('draftForm', 'CertificateController@draftForm');
Route::post('submitForm', 'CertificateController@submitForm');

Route::post('submitFormClarification', 'CertificateController@submitFormClarification');
Route::post('draftFormClarification', 'CertificateController@draftFormClarification');


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