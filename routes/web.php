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
// Frontend routes
//index and login/register part
Route::get('/','Home\IndexController@index');
Route::post('/login','Home\IndexController@login');
Route::get('/logout','Home\IndexController@logout');
Route::post('/register','Home\IndexController@register');

//wine part
Route::get('/wine','Home\WineController@show');
Route::get('/wine/like-toggle/{id}','Home\WineController@toggle');
Route::get("/wine/likes",'Home\WineController@likes')->middleware('auth:member');
Route::get("/wine/winery-wine/{wineryid}","Home\WineController@wineryCheck");
Route::any('/account/edit',"Home\AccountController@edit");

Route::get("/test","Home\TestController@test");






//  Backstage routes
Route::group(['prefix' => 'admin'],function (){
    // login part
    Route::get('public/login','Admin\PublicController@login')->name('login');
    Route::post("public/check","Admin\PublicController@check");
});


Route::group(['prefix' => 'admin','middleware' => 'auth:admin'],function (){
    // index part
    Route::get('index/show','Admin\IndexController@show');
    Route::get('index/welcome','Admin\IndexController@welcome');
    Route::get('index/logout','Admin\IndexController@logout');

    //admin manage part
    Route::get('admin/admin-list','Admin\AdminController@show');
    Route::any('admin/admin-edit/{id}','Admin\AdminController@edit');
    Route::any('admin/admin-add','Admin\AdminController@add');
    Route::get('admin/admin-toggle/{id}','Admin\AdminController@toggle');
    Route::get('admin/admin-delete/{id}','Admin\AdminController@delete');
    Route::get('admin/admin-deleteMany',"Admin\AdminController@deleteMany");

    //winery manage part
    Route::get('winery/winery-list','Admin\WineryController@show');
    Route::any('winery/winery-add','Admin\WineryController@add');
    Route::any('winery/winery-edit/{id}','Admin\WineryController@edit');
    Route::get('winery/winery-toggle/{id}','Admin\WineryController@toggle');
    Route::get('winery/winery-delete/{id}','Admin\WineryController@delete');
    Route::get('winery/winery-deleteMany','Admin\WineryController@deleteMany');

    //member manage part
    Route::get('member/member-list','Admin\MemberController@show');
    Route::get('member/member-delete/{id}','Admin\MemberController@delete');
    Route::get('member/member-toggle/{id}','Admin\MemberController@toggle');
    Route::get('member/member-deleteMany','Admin\MemberController@deleteMany');
    Route::get('member/member-like/{id}','Admin\MemberController@show_likes');


    //wine manage part
    Route::get('wine/wine-list','Admin\WineController@show');
    Route::any('wine/wine-add','Admin\WineController@add');
    Route::any('wine/wine-edit/{id}','Admin\WineController@edit');
    Route::get('wine/wine-toggle/{id}','Admin\WineController@toggle');
    Route::get('wine/wine-delete/{id}','Admin\WineController@delete');
    Route::get('wine/wine-deleteMany','Admin\WineController@deleteMany');

    //region manage part
    Route::get('region/region-list','Admin\RegionController@show');
    Route::any('region/region-add','Admin\RegionController@add');
    Route::any('region/region-edit/{id}','Admin\RegionController@edit');
    Route::get('region/region-toggle/{id}','Admin\RegionController@toggle');
    Route::get('region/region-delete/{id}','Admin\RegionController@delete');
    Route::get('region/region-deleteMany','Admin\RegionController@deleteMany');

    //variety manage part


    //comment manage part
});

