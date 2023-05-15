<?php

use App\Http\Controllers\Api\{
    CourseController
};


// use App\Http\Controllers\FilterReleaseController;

use Illuminate\Support\Facades\Route;

//route for all courses search 
Route::get('/courses', [CourseController::class,'index']);

//route for create new course
Route::post('/courses', [CourseController::class, 'store']);

//route for course search by uuid
Route::get('/courses/{identify}', [CourseController::class, 'show']);

//route for course delete
Route::delete('/courses/{identify}', [CourseController::class, 'destroy']);

//route for edit data
Route::put('courses/{identify}', [CourseController::class, 'update']);




Route::get('/', function(){
    //response do tipo json
    return response()->json(['message'=>'ok']);

});
