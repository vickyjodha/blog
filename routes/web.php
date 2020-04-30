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
    return view('welcome');
});





Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');



// categories 
Route::middleware('auth','admin')->group(function(){
    Route::get('user.index',"UserController@user_index")->name('user.index');
    Route::post('user.admin/{user}',"UserController@makeadmin")->name('user.makeadmin');
    Route::get('user.profile/{user}',"UserController@user_profile")->name('profile');
    Route::get('user.edit/{user}',"UserController@user_edit")->name('user.edt');
    Route::put('user.update/{user}',"UserController@user_update")->name('user.update');
});


Route::middleware('auth')->group(function(){
    //categoris function 
    Route::resource('categories',"CategoriesController");

    // post functtion
Route::resource('post',"PostController");
//trashpost delete before data
Route::get('trashpost',"PostController@trashpost")->name('trash-post.index');
// restore data
Route::put('restore/{id}',"PostController@restore")->name('restore');


// tages 

Route::resource('tag',"TagsController");
});




// blog site for vikram singh


Route::get('/blog',"BlogController@blog_index")->name('blog');
Route::get('/blog/post/{post}',"BlogController@post_index")->name('blog.post');
Route::get('/blog/categories/{categories}',"BlogController@categories")->name('blog.categories');
Route::get('/blog/tages/{tages}',"BlogController@tages")->name('blog.tages');






