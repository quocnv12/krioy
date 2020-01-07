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



Route::get('kids-now/children/add','Admin\ChildrenProfilesController@create');
Route::get('kids-now/notice-board/add','Admin\NoticeBoardController@create');


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

        Route::get('delete/{id}','Admin\ChildrenProfilesController@destroy');
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
        Route::get('select', function () {
            return view('pages.children.select_child');
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

        Route::get('danhsach', ['as'=>'admin.health.list','uses'=>'Admin\HealthController@getList']);
        Route::get('them',['as'=>'admin.health.getAdd','uses'=>'Admin\HealthController@getAdd']);
        Route::post('them',['as'=>'admin.health.getAdd','uses'=>'Admin\HealthController@postAdd']);
        Route::get('xoa/{id}',['as'=>'admin.health.getDelete','uses'=>'Admin\HealthController@getDelete']);
        Route::get('sua/{id}',['as'=>'admin.health.getEdit','uses'=>'Admin\HealthController@getEdit']);
        Route::post('sua/{id}',['as'=>'admin.health.postEdit','uses'=>'Admin\HealthController@postEdit']);
        Route::get('search',['as'=>'admin.health.search','uses'=>'Admin\HealthController@getSearch']);
        Route::post('search',['as'=>'admin.health.search','uses'=>'Admin\HealthController@postSearch']);
        Route::get('them_child',['as'=>'admin.health.child','uses'=>'Admin\HealthController@getChild']);



        //Route::resource('health','Admin\HealthController');
        //Route::get('xoa/{id}','Admin\HealthController@destroy')->name('deletehealth');
        //Route::get('chitiet/{id}','Admin\HealthController@getChitiet')->name('Chitiet');




    });

    //---------------observation----------------
    Route::group(['prefix' => 'observations'], function () {
        Route::get('danhsach', ['as'=>'admin.observations.list','uses'=>'Admin\ObservationController@getList']);
        Route::get('xoa/{id}',['as'=>'admin.observations.getDelete','uses'=>'Admin\ObservationController@getDelete']);
        Route::get('sua/{id}',['as'=>'admin.observations.getEdit','uses'=>'Admin\ObservationController@getEdit']);
        Route::post('sua/{id}',['as'=>'admin.observations.postEdit','uses'=>'Admin\ObservationController@postEdit']);
        Route::get('search',['as'=>'admin.observations.search','uses'=>'Admin\ObservationController@getSearch']);
        Route::post('search',['as'=>'admin.observations.search','uses'=>'Admin\ObservationController@postSearch']);


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



        //---------------food----------------
        Route::group(['prefix' => 'food'], function () {

            Route::get('','Admin\FoodController@GetFood');
        
            Route::get('select', function () {
                return view('pages.food.select_child');
            });

            Route::get('menu','Admin\FoodController@GetMenu');

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
        Route::post('edit', 'Admin\NoticeBoardController@update');

        Route::get('clip_board/{id}','Admin\NoticeBoardController@displayClipboard');

    });
    //---------------program----------------
    Route::group(['prefix' => 'program'], function () {
        Route::get('', 'Admin\ProgramsController@index');
        Route::get('add', 'Admin\ProgramsController@create');
        Route::post('add', 'Admin\ProgramsController@store');

        Route::get('select_staff','Admin\ProgramsController@selectStaff');
        Route::get('select_child','Admin\ProgramsController@selectChild');

        Route::get('edit', function () {
            return view('pages.program.edit-program');
        });
        Route::get('view', function () {
            return view('pages.program.add_program');
        });
    });
});
});

