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

/*Route::get('chatcheck',function (){
    return session('chat');
});*/

Route::post('/OutCustomar', 'WelcomeController@OutCustomar');
Route::get('/', 'WelcomeController@welcome');
Route::get('/login', 'HomeIndexController@signInOut');
Auth::routes();
//vendor/laravel/framework/src/illuminate/routing/router.php
Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('/profile/{id}', 'ProfileController@index')->middleware('CheckRegMiddleware');*/
Route::get('login/facebook', 'FbLoginControlle@redirectToProvider');
Route::get('login/facebook/callback', 'FbLoginControlle@handleProviderCallback');
Route::get('login/google', 'GmailLoginController@redirectToProvider');
Route::get('login/google/callback', 'GmailLoginController@handleProviderCallback');
Route::get('login/twitter', 'TwitterLoginController@redirectToProvider');
Route::get('login/twitter/callback', 'TwitterLoginController@handleProviderCallback');
Route::get('login/github', 'GitHubLoginController@redirectToProvider');
Route::get('login/github/callback', 'GitHubLoginController@handleProviderCallback');
Route::get('login/linkedin', 'linkedinLoginController@redirectToProvider');
Route::get('login/linkedin/callback', 'linkedinLoginController@handleProviderCallback');
/*Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');*/
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::group(['middleware' => ['CheckRegMiddleware']], function () {
    /*Route::get('/timeline','HomeIndexController@homeIndex');*/
    Route::get('/postById/{id}', 'HomeIndexController@PostById');
    Route::get('/allpostById/{id}', 'HomeIndexController@allPostById');
    Route::get('/search', 'HomeIndexController@search');
    Route::post('/searchResult', 'HomeIndexController@searchResult');
    Route::post('/pChat', 'ChatController@pChatUp');
    Route::get('/privateChat/{id}', 'ChatController@privateChat');
    Route::get('/chat', 'ChatController@Index');
    Route::post('/chat/send', 'ChatController@send');
    Route::post('saveToSession', 'ChatController@saveToSession');
    Route::post('getOldMessage', 'ChatController@getOldMessage');
    Route::get('/profile/{id}', 'ProfileController@index');
    Route::get('/gallery/{id}', 'ProfileController@gallery');
    Route::post('/profile/proup', 'ProfileController@proUp');
    Route::get('/update/login/{id}', 'UpdateController@upLogin');
    Route::post('/update/login/save', 'UpdateController@upLoginSave');
    Route::get('/update/basic/{id}', 'UpdateController@upBasic');
    Route::post('/update/save', 'UpdateController@upBasicSave');
    Route::get('/update/education/{id}', 'UpdateController@upEducation');
    Route::post('/update/save2', 'UpdateController@upEduSave');
    Route::post('/status', 'Status_postController@statusUp');
    Route::get('/status/delete/{id}', 'Status_postController@statusDelete');
    Route::get('/status/edit/{id}', 'Status_postController@statusEdit');
    Route::post('/status/update', 'Status_postController@statusUpdate');
    Route::post('/response/add', 'Status_postController@responseCreate');
    Route::post('/response/delete', 'Status_postController@responseDelete');
    Route::post('/response/update', 'Status_postController@responseUpdate');
});
Route::GET('admin/home', 'AdminController@index');
Route::GET('admin/editor', 'EditorController@index');
Route::GET('admin/share', 'EditorController@shareAdmin');
Route::GET('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin', 'Admin\LoginController@Login');
Route::POST('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset', 'Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::POST('admin/add', 'AdminController@addAdmin');
Route::POST('admin/delete', 'AdminController@deleteAdmin');
Route::POST('admin/update', 'AdminController@updateAdmin');
Route::POST('user/delete', 'UpdateController@deleteUser');
