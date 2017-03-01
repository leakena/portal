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
        /***
         * Resume Index
         */
		Route::get('/resume', 'ResumeController@index');

        /**
         * Resumes
         */
		Route::post('/resume/career_profile', 'ResumeController@store_career_profile');
		Route::get('/resume/go_back', 'ResumeController@go_back');

		Route::get('/resume/career-profile', 'ResumeController@getCareerProfile');
        Route::get('/reusme/edit-career-profile', 'ResumeController@editCareerProfile');
        /**
         * Experiences
         */
        Route::get('/get-experience-content', 'ResumeController@experienceContent')->name('get_experience_content');
        Route::post('/resume/save-experience', 'ResumeController@saveExperience')->name('save_experience');
        Route::get('/resume/edit-experience', 'ResumeController@editExperience')->name('edit_experience');
        Route::post('/resume/update-experience', 'ResumeController@updateExperience')->name('update_experience');
        Route::post('/resume/remove-experience', 'ResumeController@removeExperience')->name('remove_experience');

	});
});
