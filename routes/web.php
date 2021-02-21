<?php

use App\Post;
use Illuminate\Support\Facades\Auth;
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
//frontend
Route::get('/','FrontEndController@home')->name('index');
Route::get('/contact','FrontEndController@contact')->name('web.contact');
Route::get('/about','FrontEndController@about')->name('web.about');
Route::get('/post','FrontEndController@post')->name('post');
Route::get('/category/{slug}','FrontEndController@category')->name('web.category');
Route::get('/tag/{slug}','FrontEndController@tag')->name('web.tag');
Route::post('/contact','FrontEndController@send_message')->name('web.contact');



//backend
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Resource Controller
Route::group(['prefix' => 'admin-login','middleware'=>'auth'], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
    Route::resource('/post', 'PostController');
    Route::resource('/user', 'UserController');
    Route::get('/profile','UserController@profile')->name('user.profile');
    Route::post('/profile','UserController@profile_update')->name('user.profile.update');
    Route::get('/setting', 'SettingController@edit')->name('setting.index');
    Route::post('/setting', 'SettingController@update')->name('setting.update');
    Route::resource('/contact', 'ContactController');
});

// Route::get('/test', function () {
//     $posts=Post::all();
//     $id=1;
//     foreach ($posts as $post) {
//         $id++;
//         $post->image="https://picsum.photos/id/".$id."/600/400";
//         $post->save();
//     }
//     return $posts;
// });
// Route::get('/test', function () {
//     $posts=Post::inRandomOrder()->limit(3)->get();
//     $id=3;
//     foreach ($posts as $post) {
//         $id++;
//         $post->tags()->attach($id);
//         $post->save();
//     }
//     return $post;
// });
// Route::get('/cat', function () {
//     $posts=Post::inRandomOrder()->limit(5)->get();
//     $id=1;
//     foreach ($posts as $post) {
//         $id++;
//         $post->category_id=$id;
//         $post->save();
//     }
//     return $posts;
// });