<?php
use App\Http\Controllers\JobController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

//jobs
Route::get('/jobs/create','App\Http\Controllers\JobController@create')->name('job.create');
Route::post('/jobs/create','App\Http\Controllers\JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit','App\Http\Controllers\JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit','App\Http\Controllers\JobController@update')->name('job.update');
Route::get('/jobs/my-job','App\Http\Controllers\JobController@myjob')->name('my.job');

Route::get('/jobs/alljobs','App\Http\Controllers\JobController@alljobs')->name('alljobs');

Route::get('/jobs/applications','App\Http\Controllers\JobController@applicant')->name('applicant');


//Auth::routes();
Auth::routes(['verify' => true]); //this is for email verification



	


Route::get('/jobs/{id}/{job}','App\Http\Controllers\JobController@show')->name('jobs.show');
//company
Route::get('/company/{id}/{company}','App\Http\Controllers\CompanyController@index')->name('company.index');
Route::get('company/create','App\Http\Controllers\CompanyController@create')->name('company.view');
Route::post('company/create','App\Http\Controllers\CompanyController@store')->name('company.store');


Route::post('company/coverphoto','App\Http\Controllers\CompanyController@coverPhoto')->name('cover.photo');

Route::post('company/logo','App\Http\Controllers\CompanyController@companyLogo')->name('company.logo');



//user profile
Route::get('user/profile','App\Http\Controllers\UserController@index')->name('user.profile');
Route::post('user/profile/create','App\Http\Controllers\UserController@store')->name('profile.create');

Route::post('user/coverletter','App\Http\Controllers\UserController@coverletter')->name('cover.letter');

Route::post('user/resume','App\Http\Controllers\UserController@resume')->name('resume');
Route::post('user/avatar','App\Http\Controllers\UserController@avatar')->name('avatar');



//employer view
Route::view('employer/register','auth.employer-register')->name('employer.register');

Route::post('employer/register','App\Http\Controllers\EmployerRegisterController@employerRegister')->name('emp.register');

Route::post('/applications/{id}','App\Http\Controllers\JobController@apply')->name('apply');


//save and unsave job


//category

//company
Route::get('/companies','App\Http\Controllers\CompanyController@company')->name('company');




Route::POST('employer/register', 'App\Http\Controllers\EmployerRegisterController@employerRegister')->name('emp.register');

//sometimes routes will throw a 404 so move the route thats not working higher up on the routes list
Route::get('/','App\Http\Controllers\JobController@index');
Route::POST('/applications/{id}', 'App\Http\Controllers\JobController@apply')->name('apply');
