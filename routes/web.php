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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('contact',function(){
  return view('contact');
});


Route::get('about', function () {
  return view('about');
});
*/

//another way to call the view

Route::view('/', 'home');

//Route::view('/contact-us', 'contact');
Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');

Route::view('/about', 'about');

//passing data to view
/* 
Route::get('customers', function(){
  $customers =['Khang Mai', 'Ivan Castro', 'Q Do', 'Anakin Skywalker', 'Superman'];

  return view('internals.customers', [
    'customers' => $customers,
  ]);
}); */

//create route with controler to return a view


Route::get('/customers', 'CustomersController@index');
Route::get('/customers/create', 'CustomersController@create');
Route::post('/customers', 'CustomersController@store');
Route::get('/customers/{customer}', 'CustomersController@show');
Route::get('/customers/{customer}/edit', 'CustomersController@edit');
Route::patch('/customers/{customer}', 'CustomersController@update');
Route::delete('/customers/{customer}', 'CustomersController@destroy');
 

//Create resouce customers
//After create a resouce customer, we can apply middleware as route level
//Another way to apply middleware is at CustomersController level (please see CustomersController file for details)
//Route::resource('customers', 'CustomersController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
