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

        Route::get('/', 'PortalController@index')->name('index');
        Route::get('/profile', 'PortalController@profile')->name('profile');
        Route::get('/classmate', 'PortalController@classmate')->name('classmate');
        Route::get('/involve-project', 'PortalController@involveProject')->name('involve_project');
        Route::get('/history', 'PortalController@history')->name('history');
        Route::get('/setting', 'PortalController@setting')->name('setting');

        Route::post('/profile/timetable', 'PortalController@timetable')->name('timetable');


        Route::get('/my-post', 'PortalController@myPosts')->name('my_post');

        Route::group(['as' => 'resume.'], function () {
            Route::get('/experience', 'ResumeController@getExperience')->name('experience');
            Route::post('/experience/store', 'ResumeController@saveExperience')->name('store_experience');
            Route::get('/education', 'ResumeController@getEducation')->name('education');
            Route::get('/skill', 'ResumeController@getSkill')->name('skill');
            Route::get('/degree', 'ResumeController@get_degree')->name('get_degree');
            Route::get('/reference', 'ResumeController@get_reference')->name('reference');
            Route::get('/language', 'ResumeController@get_language')->name('language');
            Route::post('/language/find_mother_tongue', 'ResumeController@find_mother_tongue')->name('find_mother_tongue');

            Route::post('/profile/upload-profile', 'ResumeController@upload_profile')->name('upload_profile');

        });


        Route::post('/posts/store', 'PortalController@store');
        Route::get('/posts/show/{post}', 'PortalController@show');
        Route::get('/posts', 'PortalController@post')->name('allPost');
        Route::get('/posts/delete/{post}', 'PortalController@delete');
        Route::get('/posts/edit/{post}', 'PortalController@edit');
        Route::post('/posts/update/{post}', 'PortalController@update');
        Route::get('/posts/publish/{post}', 'PortalController@publish')->name('publish');
        Route::get('/score/{year}', 'PortalController@score')->name('show_score');

    });

    Route::group(['namespace' => 'Portal', 'as' => 'resume.'], function () {
        /***
         * Resume Index
         */
        Route::get('/resume-index', 'ResumeController@index')->name('index');

        /**
         * User Information
         */
        Route::get('/resume/user-info', 'ResumeController@userInfo')->name('user_info');
        Route::post('/resume/store-user-info', 'ResumeController@storeUserInfo')->name('store_user_info');
        Route::post('/resume/user-info/get_marital_status', 'ResumeController@get_marital_status')->name('get_marital_status');


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
        Route::get('/resume/experiences/get-experience', 'ResumeController@experience')->name('get_experience');
        Route::post('/resume/experiences/save-experience', 'ResumeController@saveExperience')->name('save_experience');
        Route::get('/resume/experiences/edit-experience/{id}', 'ResumeController@editExperience')->name('edit_experience');
        Route::post('/resume/experiences/update-experience', 'ResumeController@updateExperience')->name('update_experience');
        Route::post('/resume/experiences/{id}/remove-experience', 'ResumeController@removeExperience')->name('remove_experience');

        /**
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
        Route::post('/resume/skills/save-skill', 'ResumeController@saveSkill')->name('store_skill');
        Route::get('/resume/skills/edit-skill/{id}', 'ResumeController@editSkill')->name('edit_skill');
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
        Route::post('/resume/educations/save-education', 'ResumeController@saveEducation')->name('store_education');
        Route::get('/resume/educations/edit-education/{id}', 'ResumeController@editEducation')->name('edit_education');
        Route::post('/resume/educations/update-education', 'ResumeController@updateEducation');
        Route::post('/resume/educations/{id}/delete-education', 'ResumeController@deleteEducation')->name('remove_education');

        /**
         * Language
         */
        Route::get('/resume/languages', 'ResumeController@languageContent')->name('get_language_content');
        Route::get('/resume/get-languages', 'ResumeController@language')->name('get_language');
        Route::post('/resume/languages/save-language', 'ResumeController@saveLanguage')->name('store_language');
        Route::get('/resume/languages/edit-language/{id}', 'ResumeController@editLanguage')->name('edit_language');
        Route::post('/resume/languages/update_language', 'ResumeController@updateLanguage')->name('update_language');
        Route::post('/resume/languages/delete-language', 'ResumeController@deleteLanguage')->name('remove_language');
        Route::get('/resume/languages/remote_languages', 'ResumeController@remote_languages')->name('remote_languages');
        Route::get('/resume/languages/edit_remote_languages', 'ResumeController@edit_remote_languages')->name('edit_remote_languages');
        Route::post('/resume/languages/compare_language', 'ResumeController@compare_language')->name('compare_language');
        Route::post('/resume/languages/get_circle_language', 'ResumeController@get_circle_language')->name('getCircleLanguages');

        /**
         * Interest
         */
        Route::get('/resume/interests', 'ResumeController@interestContent')->name('get_interest_content');

        Route::get('/resume/get-interests', 'ResumeController@interest')->name('get_interest');

        Route::post('/resume/interests/save-interest', 'ResumeController@saveInterest')->name('save_interest');

        Route::get('/resume/interests/edit-interest/{id}', 'ResumeController@editInterest')->name('edit_interest');
        Route::post('/resume/interests/update-interest', 'ResumeController@updateInterest');
        Route::post('/resume/interests/{id}/delete-interest', 'ResumeController@deleteInterest')->name('remove_interest');

        /**
         * Reference
         */
        Route::get('/resume/references', 'ResumeController@reference')->name('get_reference');
        Route::post('/resume/references/save-reference', 'ResumeController@saveReference')->name('store_reference');
        Route::get('/resume/references/{id}/edit-reference', 'ResumeController@editReference')->name('edit_reference');
        Route::post('/resume/references/{id}/delete-reference', 'ResumeController@deleteReference')->name('remove_reference');
    });
});
