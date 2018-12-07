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
//     return view('auth.register');
// });

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('members','MemberController@index');

Route::get('addmembers','MemberController@addmembers');

Route::get('profile','ProfileController@profile');

Route::get('postarticle','PostController@postarticle');

Route::get('editprofile','ProfileController@editprofile');

Route::get('/dash', 'allController@dash');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@post');

Route::get('/category', 'categoryController@category');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('changejobtocaptain/{id}', 'MemberController@changejobtocaptain');
Route::get('changejobtovolunteer/{id}', 'MemberController@changejobtovolunteer');
Route::get('changejobtostaff/{id}', 'MemberController@changejobtostaff');

Route::get('deleteprofile/{id}', 'MemberController@deleteprofile');


Route::get('viewprofile/{ids}', 'ProfileController@viewprofile');




Route::post('/addCategory', 'categoryController@addcategory');

Route::post('/addProfile', 'ProfileController@addProfile');

Route::post('/updateProfile', 'ProfileController@updateProfile');

Route::post('/updatepassword', 'ProfileController@updatepassword');

Route::post('/updateProfilepicture', 'ProfileController@updateProfilepicture');

Route::post('/searchmember', 'MemberController@searchmember');

Route::post('/addPost', 'PostController@addPost');
