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

/* Route::get('/', function () {
    return view('welcome');
}); */

/*
Route::get('contact-us', function () {
    return view('contact');
});
*/
Route::get('about-us', function () {
    return view('about');
});


Route::view('/', 'home');
Route::get('contact-us', 'ContactFormController@create')->name('contact.create');
Route::post('contact-us', 'ContactFormController@store')->name('contact.store');

//Route::view('about-us', 'about')->middleware('test');
//Route::view('create', 'create');

/* Route::get('customers', 'CustomersController@index');
Route::get('customers/create', 'CustomersController@create');
Route::post('customers', 'CustomersController@store');
Route::get('customers/{customer}', 'CustomersController@show');
Route::get('customers/{customer}/edit', 'CustomersController@edit');
Route::patch('customers/{customer}', 'CustomersController@update');
Route::delete('customers/{customer}', 'CustomersController@destroy');
 */
Route::resource('customers', 'CustomersController');

Route::resource('student', 'StudentController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update_avatar');
