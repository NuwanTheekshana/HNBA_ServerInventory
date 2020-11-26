<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => 'auth'], function ()
{
Route::get('/home', 'HomeController@index')->name('home');
Route::POST('/add_server_details', 'serverdetailsController@add_server_details')->name('add_server_details');
Route::get('/find_server_details', 'serverdetailsController@find_server_details')->name('find_server_details');
Route::get('/view_server_details', 'serverdetailsController@view_server_details')->name('view_server_details');
Route::get('/view_vir_server_details', 'serverdetailsController@view_vir_server_details')->name('view_vir_server_details');
Route::get('/update_server_details', 'serverdetailsController@update_server_details')->name('update_server_details');
Route::get('/remove_server_details', 'serverdetailsController@remove_server_details')->name('remove_server_details');
Route::get('/vir_data_insert', 'serverdetailsController@vir_data_insert')->name('vir_data_insert');
Route::get('/vir_data_delete', 'serverdetailsController@vir_data_delete')->name('vir_data_delete');
Route::get('/main_vir_data_delete', 'serverdetailsController@main_vir_data_delete')->name('main_vir_data_delete');

// Export to excel
Route::get('/report','serverdetailsController@report')->name('report');
Route::get('/vir_report','serverdetailsController@vir_report')->name('vir_report');



Route::get('/registration', 'HomeController@registration')->name('registration');
Route::POST('/user_registration', 'HomeController@user_registration')->name('user_registration');
Route::get('/all_users', 'HomeController@all_users')->name('all_users');
Route::get('/update_user_details', 'HomeController@update_user_details')->name('update_user_details');
Route::get('/update_user_pass', 'HomeController@update_user_pass')->name('update_user_pass');
Route::get('/remove_user', 'HomeController@remove_user')->name('remove_user');

});
