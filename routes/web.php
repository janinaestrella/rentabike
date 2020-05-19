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

// Route::get('/', function () {
//     return view('welcome');
// });

//new homepage
Route::get('/', 'BikeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories/trashed-index', 'CategoryController@allCategories')
	->name('categories.trashed-index'); //taga display ng lahat ng trashed
Route::put('/categories/{category}/restore', 'CategoryController@restore')
	->name('categories.restore'); //taga restore ng trashed


Route::get('/bikes/trashed-index', 'BikeController@allCategories')
	->name('bikes.trashed-index'); //taga display ng lahat ng trashed
Route::put('/bikes/{bike}/restore', 'BikeController@restore')
	->name('bikes.restore'); //taga restore ng trashed

Route::delete('/bikerequests/clear', 'BikeRequestController@clear')->name('bikerequests.clear');

Route::put('/bikes/update-count', 'BikeRequestController@updateCount'); 

Route::resources([
	'categories' => 'CategoryController',
	'bikes' => 'BikeController',
	'bikerequests' => 'BikeRequestController',
	'rentaltransactions' => 'RentalTransactionController'
	]);

