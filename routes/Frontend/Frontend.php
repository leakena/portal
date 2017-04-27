<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('macros', 'FrontendController@test')->name('index');

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
         * User Information
         */
        Route::get('/resume/user-info', 'ResumeController@userInfo')->name('user_info');
        Route::post('/resume/store-user-info', 'ResumeController@storeUserInfo')->name('store_user_info');


        /**
         * Resumes
         */
        Route::post('/resume/save-career-profile', 'ResumeController@saveCareerProfile')->name('resumes.career-profile');
        Route::get('/resume/go_back', 'ResumeController@go_back');
        Route::get('/resume/career-profile', 'ResumeController@getCareerProfile')->name('career_profile');
        Route::get('/reusme/edit-career-profile', 'ResumeController@editCareerProfile');
        Route::post('/resume/update-career-profile', 'ResumeController@updateCareerProfile');


        Route::get('/resume/user-resume', 'ResumeController@getResumeByAjax')->name('user_resume');//get user resume by ajax function

        /**
         * Experiences
         */
        Route::get('/get-experience-content', 'ResumeController@experienceContent')->name('get_experience_content');
        Route::get('/resume/get-experience', 'ResumeController@experience')->name('get_experience');
        Route::post('/resume/save-experience', 'ResumeController@saveExperience')->name('save_experience');
        Route::get('/resume/edit-experience', 'ResumeController@editExperience')->name('edit_experience');
        Route::post('/resume/update-experience', 'ResumeController@updateExperience')->name('update_experience');
        Route::post('/resume/{id}/remove-experience', 'ResumeController@removeExperience')->name('remove_experience');

        /*
        *	Project
        */
        Route::get('/resume/projects', 'ResumeController@projectContent')->name('get_project_content');
        Route::post('/resume/projects/save-project', 'ResumeController@saveProject');
        Route::get('/resume/projects/edit-project', 'ResumeController@editProject');
        Route::post('/resume/projects/update-project', 'ResumeController@updateProject');
        Route::post('/resume/projects/delete-project', 'ResumeController@deleteProject');

        /**
         * Skill
         */
        Route::get('/resume/skills', 'ResumeController@skillContent')->name('get_skill_content');
        Route::get('/resume/get-skills', 'ResumeController@skill')->name('get_skill');
        Route::post('/resume/skills/save-skill', 'ResumeController@saveSkill');
        Route::get('/resume/skills/edit-skill', 'ResumeController@editSkill');
        Route::post('/resume/skills/update-skill', 'ResumeController@updateSkill');
        Route::post('/resume/skills/{id}/delete-skill', 'ResumeController@deleteSkill')->name('remove_skill');

        /**
         * Contact
         */
        Route::get('/resume/contacts', 'ResumeController@contactContent')->name('get_skill_content');
        Route::post('/resume/contacts/save-contact', 'ResumeController@saveContact');
        Route::get('/resume/contacts/edit-contact', 'ResumeController@editContact');
        Route::post('/resume/contacts/update-contact', 'ResumeController@updateContact');
        Route::post('/resume/contacts/delete-contact', 'ResumeController@deleteContact');

        /**
         * Education
         */
        Route::get('/resume/educations', 'ResumeController@educationContent')->name('get_education_content');
        Route::get('/resume/get-educations', 'ResumeController@education')->name('get_education');
        Route::post('/resume/educations/save-education', 'ResumeController@saveEducation');
        Route::get('/resume/educations/edit-education', 'ResumeController@editEducation');
        Route::post('/resume/educations/update-education', 'ResumeController@updateEducation');
        Route::post('/resume/educations/{id}/delete-education', 'ResumeController@deleteEducation')->name('remove_education');

        /**
         * Language
         */
        Route::get('/resume/languages', 'ResumeController@languageContent')->name('get_language_content');
        Route::get('/resume/get-languages', 'ResumeController@language')->name('get_language');
        Route::post('/resume/languages/save-language', 'ResumeController@saveLanguage');
        Route::get('/resume/languages/edit-language', 'ResumeController@editLanguage');
        Route::post('/resume/languages/update-language', 'ResumeController@updateLanguage');
        Route::post('/resume/languages/{id}/delete-language', 'ResumeController@deleteLanguage')->name('remove_language');

        /**
         * Interest
         */
        Route::get('/resume/interests', 'ResumeController@interestContent')->name('get_interest_content');
        Route::get('/resume/get-interests', 'ResumeController@interest')->name('get_interest');
        Route::post('/resume/interests/save-interest', 'ResumeController@saveInterest');
        Route::get('/resume/interests/edit-interest', 'ResumeController@editInterest');
        Route::post('/resume/interests/update-interest', 'ResumeController@updateInterest');
        Route::post('/resume/interests/{id}/delete-interest', 'ResumeController@deleteInterest')->name('remove_interest');

        /**
         * Reference
         */
        Route::get('/resume/reference', 'ResumeController@reference')->name('get_reference');
        Route::post('/resume/reference/save-reference', 'ResumeController@saveReference');
        Route::post('/resume/reference/{id}/delete-reference', 'ResumeController@deleteReference')->name('remove_reference');
    });
});
