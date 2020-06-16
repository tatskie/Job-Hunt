<?php

use Illuminate\Support\Facades\Input;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resume', 'HomeController@resume')->name('resume');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::patch('/profile', 'User\UserController@updateProfile')->name('profile');
Route::get('/employee', 'HomeController@employee')->name('employee');
Route::get('/employer', 'HomeController@employer')->name('employer');

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('posts/{slug}', 'PostsController@slug');
Route::post('posts/{slug}', 'PostsController@slug');
Route::resource('jobs', 'JobController');

Route::name('avatar')->post('avatar', 'User\UserController@update_avatar');
Route::get('profile/{id}', 'User\UserController@show');
Route::get('resume/{id}', 'User\UserController@resume');

Route::group(['middleware' => ['web']], function () {
	Route::resource('skills', 'SkillsController');
//	Route::post('addSkills', 'SkillsController@addSkill');
//	Route::put('editSkills','SkillsController@editSkill');
//  	Route::delete('deleteSkills','SkillsController@deleteSkill');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('educations', 'EducationsController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('works', 'WorksController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('company', 'CompanyController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('posts', 'PostsController');
});
//replies
Route::resource('reply', 'ReplyController');
Route::resource('posts.reply', 'PostReplyController');

//messages
Route::resource('message', 'MessageController');

//auto complete
Route::get('search', 'AutoCompleteController@search');
Route::get('test', function(){
	$notifications=auth()->user()->unreadNotifications;
	foreach($notifications as $notification){
		dd($notification->data['user']['first_name']);
	}
});

Route::get('markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
	
});
//error page----
Route::get('/401', 'HomeController@error401')->name('401');

//error page----
Route::get('/notifications', 'NotificationController@notifications');


//search Job---
Route::get('/searchJob', 'AutoCompleteController@searchBox');
Route::any('/jobresult', 'AutoCompleteController@jobResult')->name('result');
Route::post('/searchbox', 'AutoCompleteController@searchJob')->name('search');
Route::get('/searchbox', 'AutoCompleteController@printSearch');

Route::prefix('admin')->group(function () {

	Route::get('/', 'RoleController@admin');

	Route::resource('users', 'UserController');

	Route::resource('roles', 'RoleController');

	Route::resource('permissions', 'PermissionController');

	Route::resource('category', 'CategoryController');

	Route::resource('post', 'Admin\PostController');
	Route::get('updateProfile', 'Admin\PostController@adminProfile');

});