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
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::group('prefix' => 'admin','namespace' => 'admin',function(){
// 	Route::get('/', function () {
//     	return view('admin.home');
// 	})->name('home');
// });


//route fix
Route::get('kids-now/children/add','Admin\ChildrenProfilesController@create');


Route::get('kids-now/children/add','Admin\ChildrenProfilesController@create');
Route::get('kids-now/notice-board/add','Admin\NoticeBoardController@create');

Route::get('','Admin\IndexController@getIndex');
Route::get('account','Admin\IndexController@getDemoAccount');
//---------------login----------------
Route::get('login', 'Admin\LoginController@GetLogin')->name('login')->middleware('CheckLogOut');
Route::post('login', 'Admin\LoginController@PostLogin');

Route::get('forgot', 'Auth\ForgotPasswordController@GetFormResetPassword')->name('get.reset.password');
Route::post('forgot', 'Auth\ForgotPasswordController@PostFormResetPassword');
Route::get('password/reset', 'Auth\ForgotPasswordController@ResetPassword')->name('link.reset.password');
Route::post('password/reset', 'Auth\ForgotPasswordController@PostResetPassword');

Route::group(['prefix' => 'kids-now', 'middleware' => 'CheckLogin'], function () {
    Route::get('logout', 'Admin\LoginController@Logout');
    Route::get('update-password', 'Admin\LoginController@getUpdatePassword');
    Route::post('update-password', 'Admin\LoginController@postUpdatePassword');
    Route::get('/', function () {
        return view('pages.home');
    });
   
    //---------------children----------------
    Route::group(['prefix' => 'children'], function () {
        Route::get('/', 'Admin\ChildrenProfilesController@index');
        Route::get('/{id}', 'Admin\ChildrenProfilesController@show');
        Route::get('add', 'Admin\ChildrenProfilesController@create');
        Route::post('add', 'Admin\ChildrenProfilesController@store');
        Route::get('view/{id}','Admin\ChildrenProfilesController@view');
        Route::get('edit/{id}','Admin\ChildrenProfilesController@edit');
        Route::post('edit/{id}','Admin\ChildrenProfilesController@update');
        Route::get('delete/{id}','Admin\ChildrenProfilesController@destroy');

        Route::get('add_parent','Admin\ChildrenProfilesController@addParent');
        Route::get('select_child','Admin\ChildrenProfilesController@selectChild');

        //search by typeahead
        Route::get('search/name', 'Admin\ChildrenProfilesController@searchByName');
    });


    
    //---------------staff----------------
    Route::group(['prefix' => 'staff'], function () {
        Route::get('','Admin\Staff\StaffController@GetListStaff');
        Route::get('add','Admin\Staff\StaffController@GetAddStaff');
        Route::post('add','Admin\Staff\StaffController@PostAddStaff');
        Route::get('edit/{id}','Admin\Staff\StaffController@GetEditStaff');
        Route::post('edit/{id}','Admin\Staff\StaffController@PostEditStaff');
        Route::get('delete/{id}','Admin\Staff\StaffController@DeleteStaff');
    });

    //---------------attendance----------------
    Route::group(['prefix' => 'attendance'], function () {
        Route::get('/','Admin\AttendanceChildrenController@index')->name('attendance.index');
        Route::get('/{id}','Admin\AttendanceChildrenController@show')->name('attendance.show');
        Route::get('add','Admin\AttendanceChildrenController@show')->name('attendance.show');
    });

    //---------------health----------------
    Route::group(['prefix' => 'health'], function () {

        Route::get('danhsach', ['as'=>'admin.health.list','uses'=>'Admin\HealthController@getList']);
        Route::get('them',['as'=>'admin.health.getAdd','uses'=>'Admin\HealthController@getAdd']);
        Route::post('them',['as'=>'admin.health.getAdd','uses'=>'Admin\HealthController@postAdd']);
        Route::get('xoa/{id}',['as'=>'admin.health.getDelete','uses'=>'Admin\HealthController@getDelete']);
        Route::get('sua/{id}',['as'=>'admin.health.getEdit','uses'=>'Admin\HealthController@getEdit']);
        Route::post('sua/{id}',['as'=>'admin.health.postEdit','uses'=>'Admin\HealthController@postEdit']);
        Route::get('search',['as'=>'admin.health.search','uses'=>'Admin\HealthController@getSearch']);
        Route::post('search',['as'=>'admin.health.search','uses'=>'Admin\HealthController@postSearch']);
        Route::get('them_child',['as'=>'admin.health.child','uses'=>'Admin\HealthController@getChild']);
        Route::post('them_child',['as'=>'admin.health.child','uses'=>'Admin\HealthController@postChild']);
        Route::get('search/children', 'Admin\HealthController@searchByName');
        Route::get('select_child/add','Admin\HealthController@addSelectChild');
        Route::get('show/{id}','Admin\HealthController@showChildrenInProgram');

    });

    //---------------observation----------------
    Route::group(['prefix' => 'observations'], function () {
        Route::get('list', ['as'=>'admin.observations.list','uses'=>'Admin\ObservationController@getList']);
        Route::get('danhsachobservationtype', ['as'=>'admin.observations.listobservationtype','uses'=>'Admin\ObservationController@getListObservation']);
        Route::get('delete/{id}',['as'=>'admin.observations.getDelete','uses'=>'Admin\ObservationController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.observations.getEdit','uses'=>'Admin\ObservationController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.observations.postEdit','uses'=>'Admin\ObservationController@postEdit']);
        Route::get('search',['as'=>'admin.observations.search','uses'=>'Admin\ObservationController@getSearch']);
        Route::post('search',['as'=>'admin.observations.search','uses'=>'Admin\ObservationController@postSearch']);
        Route::get('add',['as'=>'admin.observations.getAdd','uses'=>'Admin\ObservationController@getAdd']);
        Route::post('add',['as'=>'admin.observations.postAdd','uses'=>'Admin\ObservationController@postAdd']);
        Route::get('them_child',['as'=>'admin.observations.child','uses'=>'Admin\ObservationController@getChild']);
        Route::post('them_child',['as'=>'admin.observations.child','uses'=>'Admin\ObservationController@postChild']);
        Route::get('search/children', 'Admin\ObservationController@searchByName');
        Route::get('select_child/add','Admin\ObservationController@addSelectChild');

        Route::get('show/{id}','Admin\ObservationController@showChildrenInProgram');
        Route::get('view/{id}',['as'=>'admin.observations.view','uses'=>'Admin\ObservationController@view']);

    });

    Route::group(['prefix' => 'observationtype'], function () {

        Route::get('xoa/{id}',['as'=>'admin.observationtype.getDelete','uses'=>'Admin\ObservationTypeController@getDelete']);
        Route::get('sua/{id}',['as'=>'admin.observationtype.getEdit','uses'=>'Admin\ObservationTypeController@getEdit']);
        Route::post('sua/{id}',['as'=>'admin.observationtype.getEdit','uses'=>'Admin\ObservationTypeController@postEdit']);
        Route::get('them',['as'=>'admin.observationtype.add','uses'=>'Admin\ObservationTypeController@getAdd']);
        Route::post('them',['as'=>'admin.observationtype.add','uses'=>'Admin\ObservationTypeController@postAdd']);


    });
    //---------------food----------------
    Route::group(['prefix' => 'food'], function () {
        Route::get('', function () {
            return view('pages.food.food');
        });
    });


    //---------------food----------------
    Route::group(['prefix' => 'food'], function () {

       
        Route::get('','Admin\FoodController@GetFood');
        Route::post('','Admin\FoodController@PostFood');
        Route::get('list','Admin\FoodController@GetList');
        Route::get('edit/{id}','Admin\FoodController@GetEdit');
        Route::post('edit/{id}','Admin\FoodController@PostEdit');
        Route::get('delete/{id}','Admin\FoodController@DeleteFood');

  

        //loại bữa ăn
        Route::get('menu-meal-type','Admin\FoodController@GetListMenuMealType');
        Route::get('menu-meal-type/add','Admin\FoodController@GetAddMenuMealType')->name('menu-meal-type-add');
        Route::post('menu-meal-type/add','Admin\FoodController@PostAddMenuMealType');
        Route::get('menu-meal-type/edit/{id}','Admin\FoodController@GetEditMenuMealType')->name('menu-meal-type-edit');
        Route::post('menu-meal-type/edit/{id}','Admin\FoodController@PostEditMenuMealType');
        Route::get('menu-meal-type/delete/{id}','Admin\FoodController@DeleteMenuMealType')->name('menu-meal-type-del');





        //số lượng
        Route::get('menu-quantity','Admin\FoodController@GetListMenuQuantity');
        Route::get('menu-quantity/add','Admin\FoodController@GetAddMenuQuantity')->name('menu-quantity-add');
        Route::post('menu-quantity/add','Admin\FoodController@PostAddMenuQuantity');
        Route::get('menu-quantity/edit/{id_qty}','Admin\FoodController@GetEditMenuQuantity')->name('menu-quantity-edit');
        Route::post('menu-quantity/edit/{id_qty}','Admin\FoodController@PostEditMenuQuantity');
        Route::get('menu-quantity/delete/{id_qty}','Admin\FoodController@DeleteMenuQuantity')->name('menu-quantity-del');



        //tên món ăn
        Route::get('menu-food-name','Admin\FoodController@GetListMenuFoodName');
        Route::get('menu-food-name/add','Admin\FoodController@GetAddMenuFoodName')->name('menu-food-name-add');
        Route::post('menu-food-name/add','Admin\FoodController@PostAddMenuFoodName');
        Route::get('menu-food-name/edit/{id_food_name}','Admin\FoodController@GetEditMenuFoodName')->name('menu-food-name-edit');
        Route::post('menu-food-name/edit/{id_food_name}','Admin\FoodController@PostEditMenuFoodName');
        Route::get('menu-food-name/delete/{id_food_name}','Admin\FoodController@DeleteFoodName')->name('menu-food-name-del');

    });


    //---------------notice board----------------
    Route::group(['prefix' => 'notice-board'], function () {
        Route::get('', 'Admin\NoticeBoardController@index');
        Route::get('/{id}', 'Admin\NoticeBoardController@show');

        Route::get('add', 'Admin\NoticeBoardController@create');
        Route::post('add', 'Admin\NoticeBoardController@store');

        Route::get('detail/{id}','Admin\NoticeBoardController@detail');

        Route::get('edit/{id}', 'Admin\NoticeBoardController@edit');
        Route::post('edit/{id}', 'Admin\NoticeBoardController@update');

        Route::get('delete/{id}','Admin\NoticeBoardController@destroy');

        //search by typeahead
        Route::get('search/name', 'Admin\NoticeBoardController@searchByTitle');

        //clip board
        Route::get('clip_board/{id}/{name}','Admin\NoticeBoardController@displayClipboard');
        Route::get('delete_clipboard/{id}/{name}','Admin\NoticeBoardController@deleteClipboard');
    });




    //---------------program----------------
    Route::group(['prefix' => 'program'], function () {
        Route::get('', 'Admin\ProgramsController@index');
        Route::get('add', 'Admin\ProgramsController@create');
        Route::post('add', 'Admin\ProgramsController@store');

        Route::get('select_staff','Admin\ProgramsController@selectStaff');
        Route::get('select_child','Admin\ProgramsController@selectChild');

        Route::get('select_child/add','Admin\ProgramsController@addSelectChild');   //ajax them children
        Route::get('select_staff/add','Admin\ProgramsController@addSelectStaff');   //ajax them staff

        Route::get('edit/{id}', 'Admin\ProgramsController@edit');
        Route::post('edit/{id}', 'Admin\ProgramsController@update');
        Route::get('view/{id}', 'Admin\ProgramsController@show');
        Route::get('delete/{id}','Admin\ProgramsController@destroy');

        Route::get('search/children','Admin\ProgramsController@searchChildren');
        Route::get('search/staff','Admin\ProgramsController@searchStaff');
        Route::get('search/program','Admin\ProgramsController@searchProgram');
    });
});
