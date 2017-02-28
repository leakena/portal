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

        Route::get('/resume/career_profile', 'ResumeController@index_career_profile');
        Route::get('/resume/experiences', 'ResumeController@index_experiences');
        Route::get('/resume/project', 'ResumeController@index_project');
        Route::get('/resume/skill', 'ResumeController@index_skill');
        Route::get('/resume/contact', 'ResumeController@index_contact');
        Route::get('/resume/languages', 'ResumeController@index_languages');

        Route::get('/resume/go_back', 'ResumeController@go_back');

    });
});
