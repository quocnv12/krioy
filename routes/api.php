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

Route::post('login', 'Api\LoginController@login');

Route::group(['prefix' => 'kids-now', 'middleware' => 'Jwtapi'], function () {
    Route::post('logout', 'Api\LoginController@logout');

    //------------food----------------
   
    
    Route::group(['prefix' => 'food'], function () {
        Route::get('', 'Api\FoodController@index');
        Route::post('add', 'Api\FoodController@store');
        Route::get('show/{id}', 'Api\FoodController@show');
        Route::post('update/{id}', 'Api\FoodController@update');
        Route::get('delete/{id}', 'Api\FoodController@destroy');


        //meal type
        Route::get('menu-meal-type', 'Api\FoodController@indexMealType');
        Route::post('menu-meal-type/add', 'Api\FoodController@storeMealType');
        Route::get('menu-meal-type/show/{id}', 'Api\FoodController@showMealType');
        Route::post('menu-meal-type/update/{id}', 'Api\FoodController@updateMealType');
        Route::get('menu-meal-type/delete/{id}', 'Api\FoodController@destroyMealType');

    });
   
    // Route::apiResource('food', 'api\FoodController@add');
    // Route::apiResource('food', 'api\FoodController');

    //---------------children----------------
    Route::group(['prefix' => 'children'], function () {
        Route::get('/', 'Api\ChildrenProfilesController@index');
        Route::get('/{id}', 'Api\ChildrenProfilesController@show');
        Route::get('add', 'Api\ChildrenProfilesController@create');
        Route::post('add', 'Api\ChildrenProfilesController@store');
        Route::get('view/{id}', 'Api\ChildrenProfilesController@view');
        Route::get('edit/{id}', 'Api\ChildrenProfilesController@edit');
        Route::post('edit/{id}', 'Api\ChildrenProfilesController@update');
        Route::get('delete/{id}', 'Api\ChildrenProfilesController@destroy');

        Route::get('add_parent', 'Api\ChildrenProfilesController@addParent');
        Route::get('select_child', 'Api\ChildrenProfilesController@selectChild');

        //search by typeahead
        Route::get('search/name', 'Api\ChildrenProfilesController@searchByName');
    });

    //---------------program----------------
    Route::group(['prefix' => 'program'], function () {
        Route::get('', 'Api\ProgramsController@index');
        Route::get('add', 'Api\ProgramsController@create');
        Route::post('add', 'Api\ProgramsController@store');

        Route::get('select_staff','Api\ProgramsController@selectStaff');
        Route::get('select_child','Api\ProgramsController@selectChild');

        Route::get('select_child/add','Api\ProgramsController@addSelectChild');   //ajax them children
        Route::get('select_staff/add','Api\ProgramsController@addSelectStaff');   //ajax them staff

        Route::get('edit/{id}', 'Api\ProgramsController@edit');
        Route::post('edit/{id}', 'Api\ProgramsController@update');
        Route::get('view/{id}', 'Api\ProgramsController@show');
        Route::get('delete/{id}','Api\ProgramsController@destroy');

        Route::get('search/children','Api\ProgramsController@searchChildren');
        Route::get('search/staff','Api\ProgramsController@searchStaff');
        Route::get('search/program','Api\ProgramsController@searchProgram');
    });

    //---------------notice board----------------
    Route::group(['prefix' => 'notice-board'], function () {
        Route::get('', 'Api\NoticeBoardController@index');
        Route::get('/{id}', 'Api\NoticeBoardController@show');

        Route::get('add', 'Api\NoticeBoardController@create');
        Route::post('add', 'Api\NoticeBoardController@store');

        Route::get('detail/{id}','Api\NoticeBoardController@detail');

        Route::get('edit/{id}', 'Api\NoticeBoardController@edit');
        Route::post('edit/{id}', 'Api\NoticeBoardController@update');

        Route::get('delete/{id}','Api\NoticeBoardController@destroy');

        //search by typeahead
        Route::get('search/name', 'Api\NoticeBoardController@searchByTitle');

        //clip board
        Route::get('clip_board/{id}/{name}','Api\NoticeBoardController@displayClipboard');
        Route::get('delete_clipboard/{id}/{name}','Api\NoticeBoardController@deleteClipboard');
    });

    //---------------observation----------------
    Route::group(['prefix' => 'observations'], function () {
        Route::get('list', ['as'=>'admin.observations.list','uses'=>'Api\ObservationController@getList']);
        Route::get('danhsachobservationtype', ['as'=>'admin.observations.listobservationtype','uses'=>'Api\ObservationController@getListObservation']);
        Route::get('delete/{id}',['as'=>'admin.observations.getDelete','uses'=>'Api\ObservationController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.observations.getEdit','uses'=>'Api\ObservationController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.observations.postEdit','uses'=>'Api\ObservationController@postEdit']);
        Route::get('search',['as'=>'admin.observations.search','uses'=>'Api\ObservationController@getSearch']);
        Route::post('search',['as'=>'admin.observations.search','uses'=>'Api\ObservationController@postSearch']);
        Route::get('add',['as'=>'admin.observations.getAdd','uses'=>'Api\ObservationController@getAdd']);
        Route::post('add',['as'=>'admin.observations.postAdd','uses'=>'Api\ObservationController@postAdd']);
        Route::get('them_child',['as'=>'admin.observations.child','uses'=>'Api\ObservationController@getChild']);
        Route::post('them_child',['as'=>'admin.observations.child','uses'=>'Api\ObservationController@postChild']);
        Route::get('search/children', 'Api\ObservationController@searchByName');
        Route::get('select_child/add','Api\ObservationController@addSelectChild');

        Route::get('show/{id}','Api\ObservationController@showChildrenInProgram');
        Route::get('view/{id}',['as'=>'admin.observations.view','uses'=>'Api\ObservationController@view']);

    });
    Route::group(['prefix' => 'observationtype'], function () {

        Route::get('xoa/{id}',['as'=>'admin.observationtype.getDelete','uses'=>'Api\ObservationTypeController@getDelete']);
        Route::get('sua/{id}',['as'=>'admin.observationtype.getEdit','uses'=>'Api\ObservationTypeController@getEdit']);
        Route::post('sua/{id}',['as'=>'admin.observationtype.getEdit','uses'=>'Api\ObservationTypeController@postEdit']);
        Route::get('them',['as'=>'admin.observationtype.add','uses'=>'Api\ObservationTypeController@getAdd']);
        Route::post('them',['as'=>'admin.observationtype.add','uses'=>'Api\ObservationTypeController@postAdd']);


    });
});

