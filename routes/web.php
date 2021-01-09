<?php

use Illuminate\Support\Facades\Route;

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
/*Route::get('/',function(){
	return view('welcome');
});*/

Route::get('/', 'HomeController@welcomeData');

Route::get('config_cache', function () {

    \Artisan::call('config:cache');

    dd("Config Cache is cleared");

});

Route::get('clear_cache', function () {

    \Artisan::call('cache:clear');

    dd("Cache is cleared");

});

Route::get('optimize_clear', function () {

    \Artisan::call('optimize:clear');

    dd("optimize is cleared");

});

Route::get('migrate', function () {

    \Artisan::call('migrate');

    dd("database migrated");

});

Route::get('seeder', function () {

    \Artisan::call('db:seed');

    dd("database seeder run");

});
Route::get('classSeeder/{className}', function ($className) {

    \Artisan::call('db:seed --class='.$className);

    dd("database". $className. " seeder run");

});

/*create user after mail send link and set the password.*/
	Route::get('admin/setPassword/{id}', 'UserController@setPassword')->name('admin.setPassword');
	Route::post('admin/insertPassword/{id}', 'UserController@insertPassword')->name('admin.insertPassword');
/*create user after mail send link and set the password.*/

/*********** 	Front Login Routes Start  *************/
	// Auth::routes();
	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

	// Registration Routes...
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	// Password Reset Routes...
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

	Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showAdminLinkRequestForm')->name('admin.password.request');
/************ 	 Front Login Routes End 	*********** */

/*********** 	Admin Login Routes Start 	  *************/
	Route::get('admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
	Route::get('admin/login', 'Auth\LoginController@showAdminLoginForm');
	Route::post('admin/login', 'Auth\LoginController@adminLogin')->name('admin.login');
	Route::post('admin/logout', 'Auth\LoginController@adminLogout')->name('admin.logout');
/************ 	 Admin Login Routes End 	*********** */

Route::group(['middleware' => ['auth:admin','role:Admin']], function () {
	Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	Route::get('admin/edit', 'AdminController@editProfile')->name('admin.edit');
	Route::post('admin/update', 'AdminController@updateProfile')->name('admin.update');
	Route::get('admin/changePassword', 'AdminController@changePassword')->name('admin.changePassword');
  	Route::post('admin/updatePassword', 'AdminController@updatePassword')->name('admin.updatePassword');

	/* Role & Permission */
	Route::get('admin/permission', 'PermissionController@index')->name('permission.index')->middleware(['permission:view_Role-Permission']);
	Route::post('admin/permission/store', 'PermissionController@store')->name('permission.store')->middleware(['permission:create_Role-Permission']);
	Route::post('permission/getPermissonData', 'PermissionController@getPermissonData')->middleware(['permission:view_Role-Permission']);

	/* user */
	Route::get('admin/user', 'UserController@index')->name('user.index')->middleware(['permission:view_User']);
	Route::get('admin/user/create', 'UserController@create')->name('user.create')->middleware(['permission:create_User']);
	Route::post('admin/user/store', 'UserController@store')->name('user.store')->middleware(['permission:create_User']);
	Route::get('admin/user/edit/{id}', 'UserController@edit')->name('user.edit')->middleware(['permission:edit_User']);
	Route::patch('admin/user/{id}/update', 'UserController@update')->name('user.update')->middleware(['permission:edit_User']);
	Route::post('admin/user/delete', 'UserController@delete')->name('user.delete')->middleware(['permission:delete_User']);
	Route::post('admin/user/getuser', 'UserController@getuser')->name('user.getuser')->middleware(['permission:view_User']);
	Route::post('admin/user/status_change', 'UserController@status_change')->name('user.status');


	/*Settings */
	Route::get('admin/setting/create', 'SettingController@create')->name('settings.create')->middleware(['permission:create_Settings']);
	Route::post('admin/setting/store', 'SettingController@store')->name('settings.store')->middleware(['permission:create_Settings']);


	/* Blog */
	Route::get('admin/blog', 'BlogController@index')->name('blog.index');
	Route::get('admin/blog/create', 'BlogController@create')->name('blog.create');
	Route::post('admin/blog/store', 'BlogController@store')->name('blog.store');
	Route::get('admin/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
	Route::patch('admin/blog/{id}/update', 'BlogController@update')->name('blog.update');
	Route::post('admin/blog/delete', 'BlogController@delete')->name('blog.delete');
	Route::post('admin/blog/getblog', 'BlogController@getblog')->name('blog.getblog');
	Route::post('admin/blog/blog_status_change', 'BlogController@blog_status_change')->name('blog.status');

	/* Gallery */
	Route::get('admin/gallery', 'GalleryController@index')->name('gallery.index');
	Route::get('admin/gallery/create', 'GalleryController@create')->name('gallery.create');
	Route::post('admin/gallery/store', 'GalleryController@store')->name('gallery.store');
	Route::get('admin/gallery/edit/{id}', 'GalleryController@edit')->name('gallery.edit');
	Route::patch('admin/gallery/{id}/update', 'GalleryController@update')->name('gallery.update');
	Route::post('admin/gallery/delete', 'GalleryController@delete')->name('gallery.delete');
	Route::post('admin/gallery/getgallery', 'GalleryController@getgallery')->name('gallery.getgallery');
	Route::post('admin/gallery/image_status_change', 'GalleryController@image_status_change')->name('gallery.status');

	/*start front contactUs image change.*/
		Route::get('admin/blog/contact_change', 'BlogController@ContactChange')->name('blog.contactChange');
		Route::patch('admin/blog/contact_image_change', 'BlogController@contact_image_change')->name('blog.contactImage');
	/*end front contactUs image change.*/

});

Route::get('blogList', 'BlogController@blogList');
Route::get('blogDetails/{id}', 'BlogController@blogDetails');

Route::get('home', 'HomeController@homePage')->name('home');
Route::get('about-us', 'HomeController@aboutUsPage')->name('aboutUs');
Route::get('gallery', 'HomeController@galleryPage')->name('gallery');
Route::get('blog', 'HomeController@blogPage')->name('blog');
Route::get('contact-us', 'HomeController@contactUsPage')->name('contactUs');
