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



/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Auth::routes();


//User & Company Routes
Route::group( [ 'namespace' => 'Frontend' , 'middleware' => 'user' ] , function () {
    Route::get('/account', 'AccountController@index');
    Route::get('/add-realestate', 'AccountController@add_realestate');
    Route::post('/post_realestate', 'AccountController@post_realestate');
    Route::get('/update-my-account', 'AccountController@update_my_account');
    Route::post('/update_account', 'AccountController@update_account');
    Route::get('/update-realestates/{id}', 'AccountController@get_update_realestates');
    Route::post('/update_realestates/{id}', 'AccountController@post_update_realestates');
    Route::get('/delete-realestates/{id}', 'AccountController@delete_realestates');
});

//Company Routes
Route::group( [ 'namespace' => 'Frontend' , 'middleware' => 'company' ] , function () {
    Route::get('/add-account', 'AccountController@add_account');
    Route::post('/post_register_company_users', 'AccountController@post_register_company_users');
    Route::post('/post_update_register_company_users', 'AccountController@post_update_register_company_users');
    Route::get('/delete_company_user/{id}', 'AccountController@delete_company_user');
    Route::get('/update-account/{id}', 'AccountController@update_company_account');

});



Route::group( ['prefix' => config('settings.BackendPath') , 'middleware' => 'admin' , 'namespace' => 'Backend' , ], function () {
Route::get('/', 'HomeController@index');

//pages
Route::resource('pages', 'PagesController');

//pages
Route::get('/messages', 'QuoteController@index');
Route::get('/messages/delete/{id}', 'QuoteController@destroy');

//images library
Route::get('/images/library', 'LibraryController@index');
Route::get('/images/library_ajax', 'LibraryController@index_ajax');
Route::post('upload_images_library', 'LibraryController@upload');


//realstates
Route::get('/realestates', 'RealstatesController@index');
Route::get('/realestates/status/{id}/{status}', 'RealstatesController@status');
Route::get('/realestates/delete/{id}', 'RealstatesController@destroy');

//posts
Route::resource('posts', 'PostsController');
Route::get('/posts/status/{id}/{status}', 'PostsController@status');
Route::get('/posts/delete/{id}', 'PostsController@destroy');
Route::get('/posts/upload/{id}', 'PostsController@get_upload');
Route::get('/posts/order/{id}/{order}', 'PostsController@post_order');
Route::post('/posts/upload', 'PostsController@post_upload');
Route::get('/upload/gallery/delete/{id}', 'PostsController@gallery_delete');
Route::get('/upload/offers/delete/{id}', 'PostsController@offers_delete');


//Users
Route::get('/users/status/{id}/{status}', 'UsersController@status');
Route::get('/users/delete/{id}', 'UsersController@destroy');
Route::resource('/users', 'UsersController');

//Roles
Route::get('/roles/status/{id}/{status}', 'RolesController@status');
Route::get('/roles/delete/{id}', 'RolesController@destroy');
Route::resource('roles', 'RolesController');

//Settings
Route::get('/settings', 'SettingsController@index');
Route::post('/settings', 'SettingsController@update');

});





/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/logout', 'Auth\LoginController@logout');

//Guest Routes
Route::group( ['namespace' => 'Frontend'], function () {
Route::get('/', 'HomeController@index');
Route::get('/page/contact-us', 'HomeController@contact');
Route::post('/quote', 'HomeController@quote');
Route::get('/page/{title}', 'HomeController@page');
Route::get('/search', 'CategoriesController@search');
Route::get('/tag/{tag}', 'CategoriesController@tag');
Route::get('/category/{category}', 'CategoriesController@index');
Route::get('/{category}/{id}/{title}', 'PostController@index');
});






//images resize
Route::get('image/{f?}/{w?}/{h?}/{y}/{m}/{src}', function ($w = 400,$h = 200 ,$f,$y,$m,$src) {

	$filename = 'uploads/'.$f.'/'.$y.'/'.$m.'/'.$src;
	//image cache
	$cachedImage = Image::cache(function ($image) use($f,$y,$m,$src,$w,$h) {
	return $image->make('uploads/'.$f.'/'.$y.'/'.$m.'/'.$src)->fit($w,$h)->encode('jpg', 50);
    }, 10);
    return Response::make( $cachedImage, 200, [ 'Content-Type' => 'image' ] );
});



//images resize
Route::get('image/{w?}/{h?}/{src}', function ($w = 400,$h = 200 ,$src) {

	$filename = 'uploads/realestate/covers/'.$src;
	//image cache
	$cachedImage = Image::cache(function ($image) use($src,$w,$h) {
	return $image->make('uploads/realestate/covers/'.$src)->fit($w,$h)->encode('jpg', 50);
    }, 10);
    return Response::make( $cachedImage, 200, [ 'Content-Type' => 'image' ] );
});




