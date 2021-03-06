<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// FrontEnd Routes
Route::get('/', 'FrontEndController@home')->name('website');
Route::get('/about', 'FrontEndController@about')->name('website.about');
Route::get('/category/{slug}', 'FrontEndController@category')->name('website.category');
Route::get('/tag/{slug}', 'FrontEndController@tag')->name('website.tag');
Route::get('/contact', 'FrontEndController@contact')->name('website.contact');
Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');

// Contact route
Route::post('/contact', 'FrontEndController@send_message')->name('website.contact');


// Admin Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('category', 'CategoryController');

    Route::resource('tag', 'TagController');
    
    Route::resource('post', 'PostController');

    // User Route
    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');

    // Settings
    Route::get('setting', 'SettingController@edit')->name('setting.index');
    Route::post('setting', 'SettingController@update')->name('setting.update');

    // Contact Route
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::get('/contact/show/{id}', 'ContactController@show')->name('contact.show');
    Route::delete('/contact/delete/{id}', 'ContactController@destroy')->name('contact.destroy');

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

