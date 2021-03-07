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

Route::get('/', 'GeneralController@getHomePage')->name('landing');


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.sign-in-post');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.sign-out-get');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('news/{slug}', 'GeneralController@getNewsPage')->name('news-single');
Route::get('category-name', 'GeneralController@getCategoryNewsPages')->name('category-name');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
//Route::prefix('admin')->group(function () {
    Route::get('dashboard', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('user_list', ['as' => 'user.user-list-get', 'uses' => 'UserController@getUserList']);
    Route::get('create_user', ['as' => 'user.user-create-get', 'uses' => 'UserController@getUserCreatePage']);
    Route::post('create_user', ['as' => 'user.user-create-post', 'uses' => 'UserController@createUser']);
    Route::get('update_user/{id}', ['as' => 'user.user-update-get', 'uses' => 'UserController@getUserUpdatePage']);
    Route::post('update_user', ['as' => 'user.user-update-post', 'uses' => 'UserController@updateUser']);
    Route::get('user-profile', ['as' => 'get-user-profile', 'uses' => 'UserController@getUserProfile']);
    Route::post('update-user-profile', ['as' => 'update-user-profile', 'uses' => 'UserController@updateUserProfile']);
    Route::post('reset-password', ['as' => 'reset-password', 'uses' => 'UserController@resetPassword']);

    Route::get('news_list', ['as' => 'get-news-list', 'uses' => 'HomeController@getNews']);
    Route::get('create_news', ['as' => 'get-create-news-page', 'uses' => 'HomeController@getCreateNewsPage']);
    Route::post('create_news', ['as' => 'create-news', 'uses' => 'HomeController@createNews']);
    Route::get('update_news/{id}', ['as' => 'get-update-news-page', 'uses' => 'HomeController@getUpdateNewsPage']);
    Route::post('update_news', ['as' => 'update-news', 'uses' => 'HomeController@getUpdateNews']);
    Route::post('upload-image-for-ckeditor', array('as'=>'upload-image-for-ckeditor','uses'=>'HomeController@uploadImageForCKEditor'));
});
