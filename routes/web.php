<?php


use App\citie;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', 'BlogController@index');

Route::get('/register', function () {
    $city=DB::table('cities')->first();
    return view('auth.register',['city'=>$city]);
});

Auth::routes();

Route::get('members','MemberController@index');

Route::get('addmembers','MemberController@addmembers');

Route::get('profile','ProfileController@profile');

Route::get('addcities','CityController@addcities');

Route::get('postarticle','PostController@postarticle');

Route::get('editprofile','ProfileController@editprofile');

Route::get('compose','MailController@compose');

Route::get('sentbox','MailController@sentbox');

Route::get('inbox','MailController@inbox');

Route::get('draft','MailController@draft');

Route::get('trash','MailController@trash');

Route::get('droplocation','LocationController@droplocation');

Route::get('/dashboard', 'allController@dash');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@post');

Route::get('/category', 'categoryController@category');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('changejobtocaptain/{id}', 'MemberController@changejobtocaptain');
Route::get('changejobtovolunteer/{id}', 'MemberController@changejobtovolunteer');
Route::get('changejobtostaff/{id}', 'MemberController@changejobtostaff');

Route::get('hald/{id}', 'MemberController@hald');
Route::get('unblock/{id}', 'MemberController@unblock');

Route::get('deleteprofile/{id}', 'MemberController@deleteprofile');

Route::get('viewprofile/{ids}', 'ProfileController@viewprofile');

Route::get('readmail/{postid}', 'MailController@readmail');

Route::get('contact','ContactController@contactView');

Route::get('viewpost/{ids}', 'BlogController@viewpost');
Route::get('deletepost/{ids}', 'BlogController@deletepost');

Route::post('/addCategory', 'categoryController@addcategory');

Route::post('/addProfile', 'ProfileController@addProfile');

Route::post('/updateProfile', 'ProfileController@updateProfile');

Route::post('/updatepassword', 'ProfileController@updatepassword');

Route::post('/updateProfilepicture', 'ProfileController@updateProfilepicture');

Route::post('/searchmember', 'MemberController@searchmember');

Route::post('/addPost', 'PostController@addPost');

Route::post('/addcity', 'CityController@addcity');

Route::post('/sendmail', 'MailController@sendmail');

Route::post('/adddraft', 'MailController@adddraft');

Route::post('/contactSave', 'ContactController@contactSave');
