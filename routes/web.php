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
use Illuminate\Http\Request;

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
        Route::get('', function () {
            return view('pages.heath.heath');
        });


    });

    //---------------observation----------------
    Route::group(['prefix' => 'observations'], function () {
        Route::get('', function () {
            return view('pages.observation.observation');
        });


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


