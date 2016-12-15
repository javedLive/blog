<?php

Route::group(array('module' => 'Course', 'namespace' => 'App\Modules\Course\Controllers'), function() {

    Route::resource('course', 'CourseController');
    
});	