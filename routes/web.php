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

Route::get('/', function () {
    return view('index');
});
//Route::get('/about','HelloController@About');
//Route::get('/home', function(){
	//echo "this is home page";
//});
//ROute::get('/blog','BoloController@Bolo');
//Route::get('/contact','HelloController@Manus');
//Route::get('/guru','HelloController@Guru');

Route::get('about','HelloController@About')->name('about');
Route::get('contact/us','HelloController@Manus')->name('contact');
//category crud are  here
Route::get('all/category','BoloController@All')->name('allcategory');
Route::get('addcategory','BoloController@Add')->name('addcategory');
Route::post('storecategory','BoloController@Store')->name('storecategory');
Route::get('/categoryview/{id}','BoloController@View');
Route::get('/deletecategory/{id}','BoloController@Delete');
Route::get('editcategory/{id}','BoloController@Edit');
Route::post('update/{id}','BoloController@Update');

// blog-posts are here
Route::get('blog','PostController@Post')->name('blog');
Route::post('/storepost','PostController@StorePost')->name('storepost');
Route::get('allpost', 'PostController@AllPost')->name('allpost');
Route::get('edit/post/{id}', 'PostController@EditPost')->name('edit/post');
Route::post('update/post/{id}','PostController@UpdatePost')->name('update/post');
Route::get('post/view/{id}','PostController@View')->name('post/view');
Route::get('delete/post/{id}', 'PostController@Delete')->name('delete/post');