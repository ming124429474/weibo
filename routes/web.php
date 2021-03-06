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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

//用户注册页
Route::get('signup','UsersController@create')->name('signup');

//用户资源路由
Route::resource('users','UsersController');

/*以上等同于下列路由*/
//Route::get('/users', 'UsersController@index')->name('users.index');
//Route::get('/users/create', 'UsersController@create')->name('users.create');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
//Route::post('/users', 'UsersController@store')->name('users.store');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

//登录退出路由
Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','sessionsController@destroy')->name('logout');

//邮箱验证
Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');

//忘记密码
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.update');

//发布微博
Route::resource('statuses','StatusesController',['only'=>['store','destroy']]);

//关注页面
Route::get('/users/{user}/followings','UsersController@followings')->name('users.followings');
//粉丝页面
Route::get('/users/{user}/followers','UsersController@followers')->name('users.followers');

//关注和取消关注
Route::post('/users/followers/{user}','FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}','FollowersController@destroy')->name('followers.destroy');