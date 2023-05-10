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



Route::get('/', function(){
    //response do tipo json
    return response()->json(['message'=>'ok']);

});
