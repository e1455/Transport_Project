<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');


// Admin Section
Route::get('admin/employee/create'             				, ['as'=>'CreateEmployee'	,'uses'=>'AdminController@create']);
Route::post('admin/employee/create'    		   				, ['as'=>'StoreEmployee'	,'uses'=>'AdminController@store']);
Route::get('admin/employee/list'      		   				, ['as'=>'ShowEmployee'		,'uses'=>'AdminController@index']);
Route::post('admin/employee/delete'            				, ['as'=>'DeleteEmployee'	,'uses'=>'AdminController@destroy']);
Route::get('admin/employee/{id}/edit'          				, ['as'=>'EditEmployee'		,'uses'=>'AdminController@edit']);
Route::post('admin/employee/{id}/edit'         				, ['as'=>'UpdateEmployee'	,'uses'=>'AdminController@update']);
Route::get('admin/employee/{id}/{name}' 				    , ['as'=>'ReportEmployee'	,'uses'=>'AdminController@report']);
Route::post('admin/employee/Pay' 				            , ['as'=>'Pay'	            ,'uses'=>'AdminController@pay']);




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
