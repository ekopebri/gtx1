<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//route admin
Route::get('/admin', function(){ return View::make('admin/index'); })->before('auth');
Route::get('upload', function(){ return View::make('upload'); });

//route login

Route::get('login', array('uses' => 'UserController@showLogin'));
Route::post('login', array('uses' => 'UserController@doLogin'));
Route::get('logout', array('uses' => 'UserController@doLogout'));

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', function() 
    { 
    	return View::make('guest/index')->with('title', 'Home'); 
    });
    Route::get('/admin/edit/password/{id}', 
    	array('as' => 'editpassword', 'uses' => 'UserController@editPassword')
    );
	Route::put('/admin/edit/password/{id}', 
		array('as' => 'updatepassword','uses' => 'UserController@updatePassword')
	);
	Route::get('admin/proyek', array('uses' => 'ProyekController@index'));
	Route::post('admin/proyek/termin', array('uses' => 'ProyekController@termin'));
	Route::post('admin/proyek/loan', array('uses' => 'ProyekController@loan'));
	Route::post('admin/proyek/cashin', array('uses' => 'ProyekController@cashin'));
	Route::post('admin/proyek/cashout', array('uses' => 'ProyekController@cashout'));
	Route::post('admin/proyek/omzet', array('uses' => 'ProyekController@omzet'));
	Route::post('admin/proyek/done', array('uses' => 'ProyekController@selesai'));
	//update
	Route::post('admin/proyek/termin/update', array('uses' => 'ProyekController@updateTermin'));
	Route::post('admin/proyek/loan/update', array('uses' => 'ProyekController@updateLoan'));
	Route::post('admin/proyek/cashin/update', array('uses' => 'ProyekController@updateCashin'));
	Route::post('admin/proyek/cashind/update', array('uses' => 'ProyekController@updateCashind'));
	Route::post('admin/proyek/cashout/update', array('uses' => 'ProyekController@updateCashout'));
	Route::post('admin/proyek/cashoutd/update', array('uses' => 'ProyekController@updateCashoutd'));
	Route::post('admin/proyek/omzet/update', array('uses' => 'ProyekController@updateOmzet'));
	Route::post('admin/proyek/omzetd/update', array('uses' => 'ProyekController@updateOmzetd'));

	//route
	Route::get('admin/anggaran', array('uses' => 'AnggaranController@index'));
	Route::post('admin/anggaran/rubah', array('uses' => 'AnggaranController@pilihAction'));
	Route::post('admin/anggaran/done', array('uses' => 'AnggaranController@selesai'));

});

Route::group(array('before' => array('admin')), function()
{

//route proyek
Route::get('admin/history', array('uses' => 'AdminController@history'));
Route::get('admin/proyek/file', array('uses' => 'ProyekController@file'));
Route::get('admin/proyek/file/get/{filename}', array('uses' => 'ProyekController@get'));
Route::get('admin/proyek/file/delete/{filename}', array('uses' => 'ProyekController@delFile'));
//route divisi
Route::get('admin/divisi', array('uses' => 'DivisiController@index'));
Route::get('admin/divisi/file', array('uses' => 'DivisiController@file'));
Route::get('admin/divisi/file/get/{filename}', array('uses' => 'DivisiController@get'));
Route::get('admin/divisi/file/delete/{filename}', array('uses' => 'DivisiController@delFile'));
Route::post('admin/divisi/loan', array('uses' => 'DivisiController@loan'));
Route::post('admin/divisi/cashout', array('uses' => 'DivisiController@cashout'));
Route::post('admin/divisi/done', array('uses' => 'DivisiController@selesai'));
	//update
	Route::post('admin/divisi/loan/update', array('uses' => 'DivisiController@updateLoan'));
	Route::post('admin/divisi/cashoutdiv/update', array('uses' => 'DivisiController@updateCashout'));
	Route::post('admin/divisi/cashoutddiv/update', array('uses' => 'DivisiController@updateCashoutd'));

//route konsolidasi
Route::get('admin/konsolidasi', array('uses' => 'KonsolidasiController@index'));
Route::post('admin/konsolidasi/termin', array('uses' => 'KonsolidasiController@termin'));
Route::post('admin/konsolidasi/loan', array('uses' => 'KonsolidasiController@loan'));
Route::post('admin/konsolidasi/cashin', array('uses' => 'KonsolidasiController@cashin'));
Route::post('admin/konsolidasi/cashout', array('uses' => 'KonsolidasiController@cashout'));
Route::post('admin/konsolidasi/omzet', array('uses' => 'KonsolidasiController@omzet'));
Route::post('admin/konsolidasi/done', array('uses' => 'KonsolidasiController@selesai'));
//Admin Proyek
Route::get('admin/proyek/home', array('as' => 'homeproyek', 'uses' => 'AdminController@showProyek'));
Route::get('admin/proyek/create', array('as' => 'createproyek', 'uses' => 'AdminController@createProyek'));
Route::post('admin/proyek/create', array('as' => 'storeproyek', 'uses' => 'AdminController@storeProyek'));
Route::get('admin/proyek/read/{id}', array('as' => 'readproyek', 'uses' => 'AdminController@readProyek'));
Route::get('admin/proyek/edit/{id}', array('as' => 'editproyek', 'uses' => 'AdminController@editProyek'));
Route::put('admin/proyek/edit/{id}', array('as' => 'updateproyek', 'uses' => 'AdminController@updateProyek'));
Route::get('admin/proyek/delete/{id}', array('as' => 'deleteproyek', 'uses' => 'AdminController@delProyek'));

//Admin Divisi
Route::get('admin/divisi/home', array('as' => 'homedivisi','uses' => 'AdminController@showDivisi'));
Route::get('admin/divisi/create', array('as' => 'createdivisi', 'uses' => 'AdminController@createDivisi'));
Route::post('admin/divisi/create', array('as' => 'storedivisi', 'uses' => 'AdminController@storeDivisi'));
Route::get('admin/divisi/read/{id}', array('as' => 'readdivisi','uses' => 'AdminController@readDivisi'));
Route::get('admin/divisi/edit/{id}', array('as' => 'editdivisi','uses' => 'AdminController@editDivisi'));
Route::put('admin/divisi/edit/{id}', array('as' => 'updatedivisi','uses' => 'AdminController@updateDivisi'));
Route::get('admin/divisi/delete/{id}', array('as' => 'deletedivisi' ,'uses' => 'AdminController@delDivisi'));
//print
Route::post('admin/print/termin', array('uses' => 'PrintController@printTermin'));
Route::post('admin/print/loan', array('uses' => 'PrintController@printLoan'));
Route::post('admin/print/cashin', array('uses' => 'PrintController@printCashin'));
Route::post('admin/print/cashout', array('uses' => 'PrintController@printCashout'));
Route::post('admin/print/omzet', array('uses' => 'PrintController@printOmzet'));

//save
Route::post('admin/save/termin', array('uses' => 'PrintController@saveTermin'));
Route::post('admin/save/loan', array('uses' => 'PrintController@saveLoan'));
Route::post('admin/save/cashin', array('uses' => 'PrintController@saveCashin'));
Route::post('admin/save/cashout', array('uses' => 'PrintController@saveCashout'));
Route::post('admin/save/omzet', array('uses' => 'PrintController@saveOmzet'));
});


Route::group(array('before' => 'superadmin'), function()
{
    //Superadmin
Route::get('/adsss', array('uses' => 'SuperadminController@index'));
Route::get('/adsss/proyekregister', array('uses' => 'SuperadminController@proyekregister'));
Route::get('/adsss/register', array('uses' => 'SuperadminController@register'));
Route::post('/adsss/proyekregister', array('uses' => 'SuperadminController@storeproyekRegister'));
Route::post('/adsss/register', array('uses' => 'SuperadminController@storeRegister'));
Route::get('/adsss/edit/{id}', array('as' => 'edituser','uses' => 'SuperadminController@editUser'));
Route::put('/adsss/edit/{id}', array('as' => 'updateuser','uses' => 'SuperadminController@updateUser'));
Route::get('/adsss/edit/proyek/{id}', array('as' => 'edituserproyek','uses' => 'SuperadminController@editUserproyek'));
Route::put('/adsss/update/proyek/{id}', array('as' => 'updateuserproyek','uses' => 'SuperadminController@updateUserproyek'));
Route::post('/adsss/delete/{id}', array('as' => 'deluser', 'uses' => 'SuperadminController@delUser'));
Route::get('/adsss/history', array('uses' => 'SuperadminController@history'));
});