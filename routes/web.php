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
Route::get('kids-now/children/add','Admin\ChildrenProfilesController@create');
Route::get('test',function (){
    return view('pages.children.create_child');
});
//---------------login----------------
Route::get('login', 'Admin\LoginController@GetLogin')->middleware('CheckLogOut');
Route::post('login', 'Admin\LoginController@PostLogin');
Route::group(['prefix' => 'kids-now', 'middleware' => 'CheckLogin'], function () {
    Route::get('logout', 'Admin\LoginController@Logout');
    Route::get('/', function () {
        return view('pages.home');
    });
    //---------------children----------------
    Route::group(['prefix' => 'children'], function () {
        Route::get('/', 'Admin\ChildrenProfilesController@index');
        Route::get('/{id}', 'Admin\ChildrenProfilesController@show');
        Route::get('add', 'Admin\ChildrenProfilesController@create');
        Route::post('add', 'Admin\ChildrenProfilesController@store');
        Route::get('edit/{id}','Admin\ChildrenProfilesController@edit');
        Route::post('edit/{id}','Admin\ChildrenProfilesController@update');
    });
    //---------------staff----------------
    Route::group(['prefix' => 'staff'], function () {
        Route::get('', function () {
            return view('pages.staff.staff_profile');
        });
        Route::get('add', function () {
            return view('pages.staff.create_staff');
        });
        Route::get('edit', function () {
            return view('pages.staff.edit_staff');
        });
        Route::get('profile', function () {
            return view('pages.staff.profile');
        });
    });
    //---------------attendance----------------
    Route::group(['prefix' => 'attendance'], function () {
        Route::get('', function () {
            return view('pages.attendance.attendance');
        });
    });
    //---------------health----------------
    Route::group(['prefix' => 'health'], function () {

        Route::resource('health','Admin\HealthController');
        Route::get('xoa/{id}','Admin\HealthController@destroy')->name('deletehealth');
        Route::get('chitiet/{id}','Admin\HealthController@getChitiet')->name('Chitiet');

        //Route::post('sua/{id}','Admin\HealthController@update')->name('sua');
        //Route::get('sua/{id}','Admin\HealthController@edit')->name('sua');

            //return view('pages.heath.heath');


    });
    //---------------observation----------------
    Route::group(['prefix' => 'observations'], function () {
        Route::resource('observations','Admin\ObservationController');
    });
    //---------------food----------------
    Route::group(['prefix' => 'food'], function () {
        Route::get('', function () {
            return view('pages.food.food');
        });
    });
    //---------------notice board----------------
    Route::group(['prefix' => 'notice-board'], function () {
        Route::get('', function () {
            return view('pages.notice.notice_board');
        });
        Route::get('add', function () {
            return view('pages.notice.add_notice');
        });
        Route::get('edit', function () {
            return view('pages.notice.edit_notice');
        });
        Route::get('detail', function () {
            return view('pages.notice.notice_detail');
        });
    });
    //---------------program----------------
    Route::group(['prefix' => 'program'], function () {
        Route::get('', function () {
            return view('pages.program.program');
        });
        Route::get('add', function () {
            return view('pages.program.add_program');
        });
        Route::get('edit', function () {
            return view('pages.program.edit-program');
        });
        Route::get('view', function () {
            return view('pages.program.view-program');
        });
    });
});
