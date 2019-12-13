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


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::group(['prefix' => 'kids-now'], function () {
    //---------------children----------------
    Route::group(['prefix' => 'children'], function () {
        Route::get('profiles', function () {
            return view('pages.children.child_profile');
        });
        Route::get('create', function () {
            return view('pages.children.create_child');
        });
        Route::get('edit', function () {
            return view('pages.children.edit_child');
        });
    });

       //---------------staff----------------
       Route::group(['prefix' => 'staff'], function () {
            Route::get('profiles', function () {
                return view('pages.staff.staff_profile');
            });
            Route::get('create_staff', function () {
                return view('pages.staff.create_staff');
            });
            Route::get('edit_staff', function () {
                return view('pages.staff.edit_staff');
            });
    });


     //---------------attendance----------------
        Route::group(['prefix' => 'attendance'], function () {
            Route::get('', function () {
                return view('pages.attendance.attendance');
            });
            
            
    });



    


});


