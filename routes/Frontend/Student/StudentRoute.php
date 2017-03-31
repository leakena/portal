<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 3/29/17
 * Time: 5:14 PM
 */

Route::group(['prefix'=> 'student', 'namespace' => 'Api\Student'], function () {

    Route::get('/course-score', 'StudentController@score')->name('student.score_data');
});