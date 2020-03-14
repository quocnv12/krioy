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

// route update modun khanh'
// Route::get('test', function () {
//     return view('pages.staff.email');
// });
 Route::get('archives', function () {
        return view('pages.archives.Archives');
    });
 Route::get('allergyinfo', function () {
        return view('pages.allergyinfo.test');
    });
 Route::get('configurations', function () {
        return view('pages.configurations.configurations');
    });
 Route::get('FAQs', function () {
        return view('pages.FAQs.FAQs');
    });
 Route::get('favouriteschool', function () {
        return view('pages.favouriteschool.favouriteschool');
    });
 Route::get('inviteparents', function () {
        return view('pages.inviteparents.inviteparents');
    });
 Route::get('invitestaff', function () {
        return view('pages.invitestaff.invitestaff');
    });
 Route::get('video-help', function () {
        return view('pages.video-help.video-help');
    });

 
//route fix

Route::get('kids-now/attendance/list', function(){
    return view('pages.attendance.list');
});


Route::get('/','Admin\IndexController@getIndex');

//------------tai khoan demo-------
Route::get('account','Admin\IndexController@getDemoAccount');
Route::post('account','Admin\IndexController@postDemoAccount');

//---------xac nhan tai khoan------------
Route::get('verify','Admin\IndexController@verifyAccount')->name('user.verify.account');

//---------------login----------------
Route::get('login', 'Admin\LoginController@GetLogin')->name('login')->middleware('CheckLogOut');
Route::post('login', 'Admin\LoginController@PostLogin');

//--------quên mật khẩu--------------------
Route::get('forgot', 'Auth\ForgotPasswordController@GetFormResetPassword')->name('get.reset.password');
Route::post('forgot', 'Auth\ForgotPasswordController@PostFormResetPassword');

Route::get('password/reset', 'Auth\ForgotPasswordController@ResetPassword')->name('link.reset.password');
Route::post('password/reset', 'Auth\ForgotPasswordController@PostResetPassword');


Route::get('passwords/reset', 'Api\ForgotPasswordController@ResetPassword')->name('link.reset.password.api');
Route::post('passwords/reset', 'Api\ForgotPasswordController@PostResetPassword');

Route::get('parent/password/reset', 'Api\Parent\ForgotPasswordController@ResetPasswordParent')->name('link.reset.password.parent');
Route::post('parent/password/reset', 'Api\Parent\ForgotPasswordController@PostResetPasswordParent');

//-------------------------group admin--------------------------
Route::group(['prefix' => 'kids-now', 'middleware' => 'CheckLogin'], function () {
    Route::get('logout', 'Admin\LoginController@Logout');

    //--đổi mật khẩu------
    Route::get('update-password', 'Admin\LoginController@getUpdatePassword');
    Route::post('update-password', 'Admin\LoginController@postUpdatePassword');
    //------trang chủ----------------
    Route::get('/','Admin\IndexController@getHome')->name('admin.home');

    //---------------children----------------
    Route::group(['prefix' => 'children','middleware' => 'checkacl:Children profiles'], function () {
        Route::get('/', 'Admin\ChildrenProfilesController@index')->name('admin.children.index');
        Route::get('add', 'Admin\ChildrenProfilesController@create')->name('admin.children.create');
        Route::post('add', 'Admin\ChildrenProfilesController@store')->name('admin.children.store');
        Route::get('/{id}', 'Admin\ChildrenProfilesController@show')->name('admin.children.show');
        Route::get('view/{id}','Admin\ChildrenProfilesController@view')->name('admin.children.view');
        Route::get('edit/{id}','Admin\ChildrenProfilesController@edit')->name('admin.children.edit')->middleware(['can:edit-profile']);
        Route::post('edit/{id}','Admin\ChildrenProfilesController@update')->name('admin.children.update');
        Route::get('delete/{id}','Admin\ChildrenProfilesController@destroy')->name('admin.children.destroy')->middleware(['can:edit-profile']);
        Route::get('add_parent','Admin\ChildrenProfilesController@addParent');
        Route::get('select_child','Admin\ChildrenProfilesController@selectChild');

        //search by typeahead
        Route::get('search/name', 'Admin\ChildrenProfilesController@searchByName');
    });


    
    //---------------staff----------------
    Route::group(['prefix' => 'staff','middleware' => 'checkacl:Staff profiles'], function () {
        Route::get('','Admin\Staff\StaffController@GetListStaff');
        Route::get('add','Admin\Staff\StaffController@GetAddStaff');
        Route::post('add','Admin\Staff\StaffController@PostAddStaff');
        Route::get('edit/{id}','Admin\Staff\StaffController@GetEditStaff')->middleware(['can:edit-profile']);
        Route::post('edit/{id}','Admin\Staff\StaffController@PostEditStaff');
        Route::get('delete/{id}','Admin\Staff\StaffController@DeleteStaff')->middleware(['can:edit-profile']);
    });

    //---------------attendance----------------
    // Route::group(['prefix' => 'attendance','middleware' => 'checkacl:Attendance'], function () {
    //     Route::get('/','Admin\AttendanceChildrenController@index')->name('attendance.index');
    //     Route::get('/{id}','Admin\AttendanceChildrenController@show')->name('attendance.show');
    //     // Route::get('add','Admin\AttendanceChildrenController@getAdd')->name('attendance.getAdd');
    //     Route::post('add/{id}','Admin\AttendanceChildrenController@postAdd')->name('attendance.postAdd');
    //     Route::get('list','Admin\AttendanceChildrenController@list')->name('attendance.list');
    // });

    Route::group(['prefix' => 'attendance','middleware' => 'checkacl:Attendance'], function () {
        Route::get('/','Admin\AttendanceChildController@index')->name('attendance.index');
        Route::get('/{id}','Admin\AttendanceChildController@show')->name('attendance.show');
        Route::post('add/{id}','Admin\AttendanceChildController@postAdd')->name('attendance.postAdd');
        Route::get('list','Admin\AttendanceChildController@list')->name('attendance.list');
    });

    //---------------health----------------
    Route::group(['prefix' => 'health','middleware' => 'checkacl:Health'], function () {

//        Route::get('/', ['as'=>'admin.health.list','uses'=>'Admin\HealthController@getList']);

        Route::get('add',['as'=>'admin.health.getAdd','uses'=>'Admin\HealthController@getAdd']);
        Route::post('add',['as'=>'admin.health.getAdd','uses'=>'Admin\HealthController@postAdd']);
        Route::get('delete/{id}',['as'=>'admin.health.getDelete','uses'=>'Admin\HealthController@getDelete'])->middleware(['can:edit-profile']);

//        Route::get('edit/{id}',['as'=>'admin.health.getEdit','uses'=>'Admin\HealthController@getEdit'])->middleware(['can:edit-profile']);
//        Route::post('edit/{id}',['as'=>'admin.health.postEdit','uses'=>'Admin\HealthController@postEdit']);

        Route::get('show/{id}','Admin\HealthController@showChildrenInProgram');
        Route::get('view/{id}',['as'=>'admin.health.view' ,'uses'=>'Admin\HealthController@view']);

        //export files
        Route::get('excel/{id}','Admin\HealthController@excel')->name('admin.health.export');

        //clip board
        Route::get('clip_board/{id}/{name}','Admin\HealthController@displayClipboard');
        Route::get('delete_clipboard/{id}/{name}','Admin\HealthController@deleteClipboard');
    });

    //---------------observation----------------
    Route::group(['prefix' => 'observations','middleware' => 'checkacl:Observations'], function () {
//        Route::get('list', ['as'=>'admin.observations.list','uses'=>'Admin\ObservationController@getList']);

        Route::get('listobservationtype', ['as'=>'admin.observations.listobservationtype','uses'=>'Admin\ObservationController@getListObservation']);
//        Route::get('edit/{id}',['as'=>'admin.observations.getEdit','uses'=>'Admin\ObservationController@getEdit'])->middleware(['can:edit-profile']);
//        Route::post('edit/{id}',['as'=>'admin.observations.postEdit','uses'=>'Admin\ObservationController@postEdit']);

        Route::get('add',['as'=>'admin.observations.getAdd','uses'=>'Admin\ObservationController@getAdd']);
        Route::post('add',['as'=>'admin.observations.postAdd','uses'=>'Admin\ObservationController@postAdd']);
        Route::get('search/children', 'Admin\ObservationController@searchByName');

        Route::get('show/{id}','Admin\ObservationController@showChildrenInProgram');
        Route::get('view/{id}',['as'=>'admin.observations.view','uses'=>'Admin\ObservationController@view']);
        Route::get('delete/{id}',['as'=>'admin.observations.getDelete','uses'=>'Admin\ObservationController@getDelete'])->middleware(['can:edit-profile']);

        //clip board
        Route::get('clip_board/{id}/{name}','Admin\ObservationController@displayClipboard');
        Route::get('delete_clipboard/{id}/{name}','Admin\ObservationController@deleteClipboard');
    });

    Route::group(['prefix' => 'observationtype'], function () {

        Route::get('delete/{id}',['as'=>'admin.observationtype.getDelete','uses'=>'Admin\ObservationTypeController@getDelete'])->middleware(['can:edit-profile']);
        Route::get('edit/{id}',['as'=>'admin.observationtype.getEdit','uses'=>'Admin\ObservationTypeController@getEdit'])->middleware(['can:edit-profile']);
        Route::post('edit/{id}',['as'=>'admin.observationtype.postEdit','uses'=>'Admin\ObservationTypeController@postEdit']);
        Route::get('add',['as'=>'admin.observationtype.add','uses'=>'Admin\ObservationTypeController@getAdd']);
        Route::post('add',['as'=>'admin.observationtype.add','uses'=>'Admin\ObservationTypeController@postAdd']);


    });
    //---------------food----------------
    Route::group(['prefix' => 'food','middleware' => 'checkacl:Food'], function () {

       
        Route::get('','Admin\FoodController@GetFood');
        Route::post('','Admin\FoodController@PostFood');
        Route::get('list','Admin\FoodController@GetList');
        Route::get('show/{id}','Admin\FoodController@showFood');
        Route::get('edit/{id}','Admin\FoodController@GetEdit')->middleware(['can:edit-profile']);
        Route::post('edit/{id}','Admin\FoodController@PostEdit');
        Route::get('delete/{id}','Admin\FoodController@DeleteFood')->middleware(['can:edit-profile']);

        //loại bữa ăn
        Route::get('menu-meal-type','Admin\FoodController@GetListMenuMealType');
        Route::get('menu-meal-type/add','Admin\FoodController@GetAddMenuMealType')->name('menu-meal-type-add');
        Route::post('menu-meal-type/add','Admin\FoodController@PostAddMenuMealType');
        Route::get('menu-meal-type/edit/{id}','Admin\FoodController@GetEditMenuMealType')->name('menu-meal-type-edit')->middleware(['can:edit-profile']);
        Route::post('menu-meal-type/edit/{id}','Admin\FoodController@PostEditMenuMealType');
        Route::get('menu-meal-type/delete/{id}','Admin\FoodController@DeleteMenuMealType')->name('menu-meal-type-del')->middleware(['can:edit-profile']);

        //số lượng
        Route::get('menu-quantity','Admin\FoodController@GetListMenuQuantity');
        Route::get('menu-quantity/add','Admin\FoodController@GetAddMenuQuantity')->name('menu-quantity-add');
        Route::post('menu-quantity/add','Admin\FoodController@PostAddMenuQuantity');
        Route::get('menu-quantity/edit/{id_qty}','Admin\FoodController@GetEditMenuQuantity')->name('menu-quantity-edit')->middleware(['can:edit-profile']);
        Route::post('menu-quantity/edit/{id_qty}','Admin\FoodController@PostEditMenuQuantity');
        Route::get('menu-quantity/delete/{id_qty}','Admin\FoodController@DeleteMenuQuantity')->name('menu-quantity-del')->middleware(['can:edit-profile']);

        //tên món ăn
        Route::get('menu-food-name','Admin\FoodController@GetListMenuFoodName');
        Route::get('menu-food-name/add','Admin\FoodController@GetAddMenuFoodName')->name('menu-food-name-add');
        Route::post('menu-food-name/add','Admin\FoodController@PostAddMenuFoodName');
        Route::get('menu-food-name/edit/{id_food_name}','Admin\FoodController@GetEditMenuFoodName')->name('menu-food-name-edit')->middleware(['can:edit-profile']);
        Route::post('menu-food-name/edit/{id_food_name}','Admin\FoodController@PostEditMenuFoodName');
        Route::get('menu-food-name/delete/{id_food_name}','Admin\FoodController@DeleteFoodName')->name('menu-food-name-del')->middleware(['can:edit-profile']);

    });


    //---------------notice board----------------
    Route::group(['prefix' => 'notice-board','middleware' => 'checkacl:Noticeboard'], function () {
        Route::get('', 'Admin\NoticeBoardController@index')->name('admin.notice-board.index');

        Route::get('add', 'Admin\NoticeBoardController@create')->name('admin.notice-board.create');
        Route::post('add', 'Admin\NoticeBoardController@store')->name('admin.notice-board.store');

        Route::get('/{id}', 'Admin\NoticeBoardController@show')->name('admin.notice-board.show');

        Route::get('detail/{id}','Admin\NoticeBoardController@detail')->name('admin.notice-board.detail');

        Route::get('edit/{id}', 'Admin\NoticeBoardController@edit')->name('admin.notice-board.edit')->middleware(['can:edit-profile']);
        Route::post('edit/{id}', 'Admin\NoticeBoardController@update')->name('admin.notice-board.update');

        Route::get('delete/{id}','Admin\NoticeBoardController@destroy')->name('admin.notice-board.destroy')->middleware(['can:edit-profile']);

        //search by typeahead
        Route::get('search/name', 'Admin\NoticeBoardController@searchByTitle');

        //clip board
        Route::get('clip_board/{id}/{name}','Admin\NoticeBoardController@displayClipboard')->name('admin.notice-board.displayClipboard');
        Route::get('delete_clipboard/{id}/{name}','Admin\NoticeBoardController@deleteClipboard')->name('admin.notice-board.deleteClipboard');
    });




    //---------------program----------------
    Route::group(['prefix' => 'program','middleware' => 'checkacl:Programs'], function () {
        Route::get('', 'Admin\ProgramsController@index')->name('admin.program.index');
        Route::get('add', 'Admin\ProgramsController@create')->name('admin.program.create');
        Route::post('add', 'Admin\ProgramsController@store')->name('admin.program.store');

        Route::get('select_child/add','Admin\ProgramsController@addSelectChild');   //ajax them children
        Route::get('select_staff/add','Admin\ProgramsController@addSelectStaff');   //ajax them staff

        Route::get('edit/{id}', 'Admin\ProgramsController@edit')->name('admin.program.edit')->middleware(['can:edit-profile']);
        Route::post('edit/{id}', 'Admin\ProgramsController@update')->name('admin.program.update');
        Route::get('view/{id}', 'Admin\ProgramsController@show')->name('admin.program.show');
        Route::get('delete/{id}','Admin\ProgramsController@destroy')->name('admin.program.destroy')->middleware(['can:edit-profile']);

        Route::get('search/children','Admin\ProgramsController@searchChildren');
        Route::get('search/staff','Admin\ProgramsController@searchStaff');
        Route::get('search/program','Admin\ProgramsController@searchProgram');

        //export files
        Route::get('excel/{id}','Admin\ProgramsController@excel')->name('admin.program.excel');
    });


    //--------------------------------Phân Quyền-------------------------------
    Route::group(['prefix' => 'role','middleware' => 'checkacl:Role'], function () {
        Route::get('', 'Admin\PermissionControler@listRole');
        Route::get('add', 'Admin\PermissionControler@getAddRole');
        Route::post('add', 'Admin\PermissionControler@postAddRole');
        Route::get('edit/{id}', 'Admin\PermissionControler@getEditRole')->middleware(['can:edit-profile']);
        Route::post('edit/{id}', 'Admin\PermissionControler@postEditRole');
        Route::get('delete/{id}', 'Admin\PermissionControler@deleteRole')->middleware(['can:edit-profile']);
    
    });





    //-----------------------Parent-note---------------------
    Route::group(['prefix' => 'parent-note','middleware' => 'checkacl:Parent notes'], function () {
        Route::get('', 'Admin\ParentNote\ParentNoteControler@listParentNote');
        Route::get('/{id}', 'Admin\ParentNote\ParentNoteControler@viewParentNote');
        Route::get('detail/{id}', 'Admin\ParentNote\ParentNoteControler@detailParentNote');
    
    });





    //--------------------------------Lịch Sử-------------------------------
    Route::group(['prefix' => 'history'], function () {
      Route::get('', 'Admin\HistoryController@index')->name('admin.history.list');
      Route::get('delete/{id}', 'Admin\HistoryController@destroy')->name('admin.history.destroy');
    });

});


Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::fallback(function () {
    return view('pages.not-found.notfound');
});
