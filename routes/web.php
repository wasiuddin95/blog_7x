<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// FrontEnd Routes
Route::get('/', 'FrontEndController@home')->name('website');
Route::get('/about', 'FrontEndController@about')->name('website.about');
Route::get('/category/{slug}', 'FrontEndController@category')->name('website.category');
Route::get('/contact', 'FrontEndController@contact')->name('website.contact');
Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');


// Admin Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::resource('category', 'CategoryController');

    Route::resource('tag', 'TagController');
    
    Route::resource('post', 'PostController');

    // User Route
    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');

});

// Route::get('/test', function () {
//     $posts = App\Post::all();

//     $id = 60;

//     foreach($posts as $post){
//         $post->image = "https://www.picsum.photos/id/".$id."/600/400.jpg";
//         $post->save();
//         $id++;
//     }

//     return $posts;
// });

