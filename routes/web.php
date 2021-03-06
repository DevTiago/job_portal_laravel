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

Route::get('/', 'JobController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// jobs
Route::get('job/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('jobs/create', 'JobController@create')->name('job.create');
Route::post('jobs/create', 'JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit', 'JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit', 'JobController@update')->name('job.update');
Route::get('jobs/listjobs', 'JobController@listJobs')->name('job.listjobs');

Route::get('jobs/applications', 'JobController@applicant');
Route::get('jobs/alljobs', 'JobController@alljobs')->name('allJobs');

//Company route
Route::get('company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('company/create', 'CompanyController@create')->name('company.view');
Route::post('company/create', 'CompanyController@store')->name('company.store');
Route::post('company/cover_photo', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo', 'CompanyController@companyLogo')->name('company.logo');

//user profile
Route::get('user/profile', 'UserprofileController@index')->name('profile.view');
Route::post('user/profile/create', 'UserprofileController@store')->name('profile.create');
Route::post('user/coverletter', 'UserprofileController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserprofileController@resume')->name('resume');
Route::post('user/avatar', 'UserprofileController@avatar')->name('avatar');


//employer view
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');
Route::post('applications/{id}', 'JobController@apply')->name('apply');
