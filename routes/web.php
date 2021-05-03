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

// FRONT-END ROUTES
Route::get('/', 'FrontpageController@index')->name('home');
Route::get('/search', 'FrontpageController@search')->name('search');

Route::get('/about-us', 'PagesController@aboutUs')->name('about-us');
Route::get('/team/member/{id}', 'PagesController@member')->name('member');
Route::get('/startups', 'PagesController@startups')->name('startups');
Route::get('/startups/{id}', 'PagesController@startup')->name('startup');
Route::get('/events', 'PagesController@events')->name('events');
Route::get('/events/{id}', 'PagesController@event')->name('event');
Route::get('/events', 'PagesController@events')->name('events');
Route::get('/gallery', 'PagesController@gallery')->name('gallery');

Route::get('/incubation', 'PagesController@incubation')->name('incubation');
Route::post('/store', 'PagesController@incubationStore')->name('incubation.store');
Route::get('/wdts', 'PagesController@wdts')->name('wdts');
Route::post('/wdts', 'PagesController@wdtsStore')->name('wdts.store');

Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/blog/{id}', 'PagesController@blogshow')->name('blog.show');
Route::post('/blog/comment/{id}', 'PagesController@blogComments')->name('blog.comment');
Route::get('/blog/categories/{slug}', 'PagesController@blogCategories')->name('blog.categories');
Route::get('/blog/tags/{slug}', 'PagesController@blogTags')->name('blog.tags');
Route::get('/blog/author/{username}', 'PagesController@blogAuthor')->name('blog.author');
Route::get('/blog/search','PagesController@blogSearch')->name('blog.search');
Route::post('/blog/filter','PagesController@blogFilter')->name('blog.filter');


Route::get('/contact', 'PagesController@contact')->name('contact');
Route::post('/contact', 'PagesController@contactStore')->name('contact.store');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {
//     Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
// });




// Back-end routes
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'as'=>'admin.'], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('users', 'UsersController')->middleware('can:manage-users');
    Route::resource('roles','RolesController');
    Route::resource('tags','TagController');
    Route::resource('categories','CategoryController');
    Route::resource('sliders','SliderController');
    Route::resource('services','ServiceController');
    Route::resource('startup','StartupController');
    Route::resource('team','ManagementController');
    Route::resource('aspect','AspectController');
    Route::resource('partners','PartnerController');
    Route::resource('events','EventController');
    Route::resource('incubation','IncubationController');
    Route::resource('wdts','wdtsController');

    Route::get('posts', 'PostController@index')->name('posts.index');
    Route::get('posts/create', 'PostController@create')->name('posts.create');
    Route::post('posts/store', 'PostController@store')->name('posts.store');
    Route::get('posts/{id}/show', 'PostController@show')->name('posts.show');
    Route::get('posts/{id}/edit', 'PostController@edit')->name('posts.edit');
    Route::post('posts/{id}/update', 'PostController@update')->name('posts.update');
    Route::get('posts/{id}/delete', 'PostController@destroy')->name('posts.destroy');

    Route::post('events/gallery/delete','EventController@galleryImageDelete')->name('gallery-delete');

    Route::get('about/','AboutController@index')->name('about.index');
    Route::post('about/{id}','AboutController@update')->name('about.update');

    Route::get('background/','BackgroundController@index')->name('background.index');
    Route::post('background/{id}/','BackgroundController@update')->name('background.update');

    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('profile','DashboardController@profileUpdate')->name('profile.update');

    Route::get('message','DashboardController@message')->name('message');
    Route::get('message/read/{id}','DashboardController@messageRead')->name('message.read');
    Route::get('message/replay/{id}','DashboardController@messageReply')->name('message.reply');
    Route::post('message/replay','DashboardController@messageSend')->name('message.send');
    Route::post('message/readunread','DashboardController@messageReadUnread')->name('message.readunread');
    Route::delete('message/delete/{id}','DashboardController@messageDelete')->name('messages.destroy');
    Route::post('message/mail', 'DashboardController@contactMail')->name('message.mail');

    Route::get('changepassword','DashboardController@changePassword')->name('changepassword');
    Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');

    Route::get('settings', 'DashboardController@settings')->name('settings');
    Route::post('settings', 'DashboardController@settingStore')->name('settings.store');

    Route::get('galleries/album','GalleryController@album')->name('album');
    Route::post('galleries/album/store','GalleryController@albumStore')->name('album.store');
    Route::get('galleries/{id}/gallery','GalleryController@albumGallery')->name('album.gallery');
    Route::post('galleries','GalleryController@Gallerystore')->name('galleries.store');

});
