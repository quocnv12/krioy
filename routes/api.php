<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('test','Api\TestApiController@GetTest');



//children_profiles
Route::get('children_profiles','Admin\ChildrenProfilesController@index');
Route::get('children_profiles/{id}','Admin\ChildrenProfilesController@show');
Route::post('children_profiles', 'Admin\ChildrenProfilesController@store');
Route::put('children_profiles/{id}','Admin\ChildrenProfilesController@update');
Route::delete('children_profiles/{id}','Admin\ChildrenProfilesController@destroy');

//attendance_children
Route::get('attendance_children','Admin\AttendanceChildrenController@index');
Route::get('attendance_children/{id}','Admin\AttendanceChildrenController@show');

//programs
Route::get('programs','Admin\ProgramsController@index');
Route::get('programs/{id}','Admin\ProgramsController@show');
Route::post('programs', 'Admin\ProgramsController@store');
Route::put('programs/{id}','Admin\ProgramsController@update');
Route::delete('programs/{id}','Admin\ProgramsController@destroy');

