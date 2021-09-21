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

Auth::routes();



Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('resume', 'Candidate\ResumeController');
    Route::resource('company', 'Employer\CompanyController');
    Route::resource('job', 'Employer\createJobController');
    Route::get('manageCompany', 'Employer\createJobController@manage')->name('manage.company');
    Route::get('BrowseResume', 'Employer\createJobController@browseResume')->name('browse.resume');
    Route::get('resume/{resume}', 'Employer\createJobController@showResume' )->name('show.resume');
    Route::get('BrowseJobs', 'Candidate\ResumeController@browseJobs')->name('browse.jobs');
    Route::get('job/{job}', 'Candidate\ResumeController@showJob' )->name('show.job');
    Route::resource('Application', 'ApplicationController' );
    Route::get('ApplicationCreate/{job}', 'ApplicationController@applicationCreate' )->name('create.application');
    Route::get('appliedJobs', 'Candidate\ResumeController@appliedJobs')->name('applied.jobs');
    Route::get('application/{job}', 'Employer\createJobController@showApplication' )->name('show.application');
    Route::delete('application/{user}/{job}', 'ApplicationController@deleteApplication' )->name('delete.application');
    Route::get('resu/{user}', 'Employer\createJobController@showResumeApp' )->name('app.Resume');

    Route::put('status/{user}/{job}', 'ApplicationController@updateStatus')->name('update.status');
});




