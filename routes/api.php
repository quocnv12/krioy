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



//-----Đăng nhập----
Route::post('login', 'Api\LoginController@login');


//-------------------Quên mật khẩu-----------------
Route::post('forgot', 'Api\ForgotPassWordController@PostFormResetPassword');
Route::post('password/reset', 'Api\ForgotPassWordController@PostResetPassword');

//-----------------Tài khoản demo-------------------
Route::post('account','Api\ForgotPassWordController@postDemoAccount');

//-------------------Group Admin------------------
Route::group(['prefix' => 'kids-now', 'middleware' => 'Jwtapi'], function () {
    Route::get('logout', 'Api\LoginController@logout');
    Route::get('token/refresh', 'Api\LoginController@refresh');

    //---------------AttendanceChildren----------------
    Route::group(['prefix' => 'attendance'], function (){
        Route::get('/','Api\AttendanceChildrenController@index')->name('attendance.index');
        Route::get('list','Api\AttendanceChildrenController@list')->name('attendance.list');
        Route::get('/{id}','Api\AttendanceChildrenController@show')->name('attendance.show');
        Route::post('add/{id}','Api\AttendanceChildrenController@postAdd')->name('attendance.postAdd');
       
    });
    //Permission
    Route::group(['prefix' => 'permission'], function (){
        Route::get('','Api\PermissionController@index');
        Route::get('show/{id}','Api\PermissionController@show');
        Route::post('add','Api\PermissionController@store');
       
    });

    //--đổi mật khẩu------
    Route::post('update-password', 'Api\ForgotPassWordController@postUpdatePassword');


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

         //quantity
         Route::get('menu-quantity', 'Api\FoodController@indexQuantity');
         Route::post('menu-quantity/add', 'Api\FoodController@storeQuantity');
         Route::get('menu-quantity/show/{id}', 'Api\FoodController@showQuantity');
         Route::post('menu-quantity/update/{id}', 'Api\FoodController@updateQuantity');
         Route::get('menu-quantity/delete/{id}', 'Api\FoodController@destroyQuantity');

    });
   
    // Route::apiResource('food', 'api\FoodController@add');
    // Route::apiResource('food', 'api\FoodController');

    Route::group(['prefix' => 'staff'], function () {
        Route::get('','Api\Staff\StaffController@index');
        Route::get('show/{id}','Api\Staff\StaffController@show');
        Route::post('add','Api\Staff\StaffController@store');
        Route::post('update/{id}','Api\Staff\StaffController@update');
        Route::get('delete/{id}','Api\Staff\StaffController@destroy');
       
    });





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

        //clip board
        Route::get('clip_board/{id}/{name}','Api\ObservationController@displayClipboard');
        Route::get('delete_clipboard/{id}/{name}','Api\ObservationController@deleteClipboard');

    });

    //---------------observationtype----------------

    Route::group(['prefix' => 'observationtype'], function () {

        Route::get('xoa/{id}',['as'=>'admin.observationtype.getDelete','uses'=>'Api\ObservationTypeController@getDelete']);
        Route::get('sua/{id}',['as'=>'admin.observationtype.getEdit','uses'=>'Api\ObservationTypeController@getEdit']);
        Route::post('sua/{id}',['as'=>'admin.observationtype.getEdit','uses'=>'Api\ObservationTypeController@postEdit']);
        Route::get('them',['as'=>'admin.observationtype.add','uses'=>'Api\ObservationTypeController@getAdd']);
        Route::post('them',['as'=>'admin.observationtype.add','uses'=>'Api\ObservationTypeController@postAdd']);


    });
    //---------------health----------------
    Route::group(['prefix' => 'health'], function () {

        Route::get('danhsach', ['as'=>'admin.health.list','uses'=>'Api\HealthController@getList']);
        Route::get('them',['as'=>'admin.health.getAdd','uses'=>'Api\HealthController@getAdd']);
        Route::post('them',['as'=>'admin.health.getAdd','uses'=>'Api\HealthController@postAdd']);
        Route::get('xoa/{id}',['as'=>'admin.health.getDelete','uses'=>'Api\HealthController@getDelete'])->middleware(['can:edit-profile']);
        Route::get('sua/{id}',['as'=>'admin.health.getEdit','uses'=>'Api\HealthController@getEdit'])->middleware(['can:edit-profile']);
        Route::post('sua/{id}',['as'=>'admin.health.postEdit','uses'=>'Api\HealthController@postEdit']);
        Route::get('search',['as'=>'admin.health.search','uses'=>'Api\HealthController@getSearch']);
        Route::post('search',['as'=>'admin.health.search','uses'=>'Api\HealthController@postSearch']);
        Route::get('them_child',['as'=>'admin.health.child','uses'=>'Api\HealthController@getChild']);
        Route::post('them_child',['as'=>'admin.health.child','uses'=>'Api\HealthController@postChild']);
        Route::get('search/children', 'Api\HealthController@searchByName');
        Route::get('select_child/add','Api\HealthController@addSelectChild');
        Route::get('show/{id}','Api\HealthController@showChildrenInProgram');

    });
});




//---------------------------------api parent----------------------
Route::post('parent/login', 'Api\Parent\LoginController@loginParent')->middleware('assign.guard:admin');

Route::group(['prefix' => 'parent','middleware' => ['assign.guard:admin','jwt.admin']], function () {
    
    Route::post('logout', 'Api\Parent\LoginController@logout');
    Route::post('refresh', 'Api\Parent\LoginController@refresh');
    // Route::post('me', 'Api\Parent\LoginController@me');
    // Route::get('food', 'Api\Parent\FoodController@getme');



    
});



