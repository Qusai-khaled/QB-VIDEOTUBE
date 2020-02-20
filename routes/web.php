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

use Symfony\Component\HttpFoundation\Session\Session;

Route::get('locale/{locale}', function ($locale) {
    Session()->put('locale', $locale);
    return redirect()->back();
})->name('Localization');
// Route of BackEnd (ADMIN)
Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('home', 'Home@index')->name('admin');
    Route::resource('users', 'Users')->except(['show']);
    Route::resource('categories', 'Categories')->except(['show']);
    Route::resource('skills', 'Skills')->except(['show']);
    Route::resource('tags', 'Tags')->except(['show']);
    Route::resource('pages', 'Pages')->except(['show']);
    Route::resource('videos', 'Videos')->except(['show']);
    Route::resource('messages', 'Messages');
    Route::post('message/replay/{id}', 'Messages@replay')->name('message-replay');
    // Route of Comments
    Route::post('comments', 'Videos@commentStore')->name('comments.store');
    Route::post('comments/{id}', 'Videos@commentUpdat')->name('comment.update');
    Route::get('comments/{id}', 'Videos@commentDelete')->name('comment.delete');
});




Auth::routes();

// Route of FrontkEnd (USER)
Route::get('/', 'HomeController@welcome')->name('frontend.landing');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skill')->name('front.skill');
Route::get('video/{id}', 'HomeController@video')->name('front.video');
Route::get('tag/{id}', 'HomeController@tag')->name('front.tag');
Route::post('comment/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
Route::post('comment/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
Route::get('contact_us', 'HomeController@contactUs')->name('contact_us');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');
Route::post('profile/update', 'HomeController@profileUpdate')->name('profile.update');
Route::get('comments/{id}/delete', 'HomeController@commentDelete')->name('delete.comment');
