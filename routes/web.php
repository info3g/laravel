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

Auth::routes();

Route::group(['middleware'=>'admin'],function() {
    Route::resource('test','TestingController');
    Route::resource('dashboard','DashboardController');
    Route::resource('websitemanager','WebsiteManagerController');
    Route::resource('service','ServiceController');
    Route::resource('slider','SlidersController');
    Route::resource('faqs','FaqsController');
    Route::resource('subscriptions','SubscriptionController');
    Route::resource('teams','TeamsController');
    Route::resource('portfolios','PortfoliosController');
    Route::resource('queries','QueriesController');
    Route::resource('news','NewsController');
    Route::resource('comments','CommentsController');
    
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/dashboard/activeUser/{id}','DashboardController@activeUser');
    Route::get('/dashboard/deactiveUser/{id}','DashboardController@deactiveUser');
    Route::get('/dashboard/dashboard','DashboardController@dashboard')->name('dashboard.dashboard');
    Route::post('/dashboard/export-file/{type}','DashboardController@exportFile')->name('export.file');
    Route::post('/dashboard/update/{id}','DashboardController@update');
    
    Route::get('/faqs/create/{data}','FaqsController@create')->name('faqs.create');
    Route::get('/search','SubscriptionController@search');

    // IMAGE UPLOAD ROUTES FOR WEBSITEMANGER
	Route::get('/websitemanager/updateimage/{id}','WebsiteManagerController@updateImage')->name('websitemanager.updateImage');
	Route::put('/websitemanager/uploadimage/{id}','WebsiteManagerController@uploadImage')->name('websitemanager.uploadImage');
	
	// IMAGE UPLOAD ROUTES FOR SLIDERCONTROLLER
	Route::get('/slider/updateimage/{id}','SlidersController@updateImage')->name('slider.updateImage');
	Route::put('/slider/uploadimage/{id}','SlidersController@uploadImage')->name('slider.uploadImage');
	
	// IMAGE UPLOAD ROUTES FOR TEAMSCONTROLLER
	Route::get('/teams/updateimage/{id}','TeamsController@updateImage')->name('teams.updateImage');
	Route::put('/teams/uploadimage/{id}','TeamsController@uploadImage')->name('teams.uploadImage');
	
	// IMAGE UPLOAD ROUTES FOR PORFOLIOCONTROLLER
	Route::get('/portfolios/updateimage/{id}','PortfoliosController@updateImage')->name('portfolios.updateImage');
	Route::put('/portfolios/uploadimage/{id}','PortfoliosController@uploadImage')->name('portfolios.uploadImage');
	
	// IMAGE UPLOAD ROUTES FOR PORFOLIOCONTROLLER
	Route::get('/news/updateimage/{id}','NewsController@updateImage')->name('news.updateImage');
	Route::put('/news/uploadimage/{id}','NewsController@uploadImage')->name('news.uploadImage');
});

// VERIFY EMAIL SEND LINK WHILE REGISTRING FORM SEND EMAIL USING SEND GRID
Route::get('/verify/{id}/{token}', 'Auth\VerificationController@verify');

// ROUTES ACCESS BY NON-AUTHORIZED USER
Route::get('/','WebsiteController@index')->name('website.index');
Route::get('/blog/show/{id}','WebsiteController@show')->name('website.show');

Route::group(['middleware'=>'user'],function() {
	Route::get('/profile','WebsiteController@profile')->name('website.profile');
});

Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');





// Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@active'));
// Route::get('/', 'HomeController@index')->name('home');

/*
Route::group(['middleware'=>'auth'], function () {
	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin','uses'=>'TestingController@allUsers']);
	Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin','uses'=>'TestingController@adminSuperadmin']);
	Route::get('permissions-superadmin',['middleware'=>'check-permission:admin','uses'=>'TestingController@superadmin']);
});
*/
//Route::group(['check-permission' => 'admin'], function ($router) {
//    Route::resource('test', 'TestingController');
//});
//Route::resource('test', 'TestingController', ['middleware' => 'admin']);

