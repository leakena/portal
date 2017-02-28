<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('macros', 'FrontendController@macros')->name('macros');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
	Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
		/*
		 * User Dashboard Specific
		 */
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');

		/*
		 * User Account Specific
		 */
		Route::get('account', 'AccountController@index')->name('account');

		/*
		 * User Profile Specific
		 */
		Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

	});

	Route::group(['namespace' => 'Portal', 'as' => 'portal.'], function () {

		Route::get('/', 'PortalController@index');
		Route::post('/posts/store', 'PortalController@store');
		Route::get('/posts/show/{post}', 'PortalController@show');
		Route::get('/posts', 'PortalController@post')->name('allPost');
		Route::get('/posts/delete/{post}', 'PortalController@delete');
		Route::get('/posts/edit/{post}', 'PortalController@edit');
		Route::post('/posts/update/{post}', 'PortalController@update');

	});

	Route::group(['namespace' => 'Portal', 'as' => 'resume.'], function () {

		Route::get('/resume', 'ResumeController@index');
		Route::post('/resume/career_profile/{resume}', 'ResumeController@update_career_profile');
		Route::post('/resume/experiences', 'ResumeController@store_experience');

		Route::post('/resume/project', 'ResumeController@store_project');
		Route::post('/resume/skill', 'ResumeController@store_skill');
		Route::post('/resume/contact', 'ResumeController@store_contact');
		Route::post('/resume/career_profile', 'ResumeController@store_career');


		Route::get('/resume/go_back', 'ResumeController@go_back');

	});
});
