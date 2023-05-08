<?php

use App\Http\Controllers\Api\{
    CourseController
};


// use App\Http\Controllers\FilterReleaseController;

use Illuminate\Support\Facades\Route;

//route for all courses search 
Route::get('/courses', [CourseController::class,'index']);

Route::get('/', function(){
    //response do tipo json
    return response()->json(['message'=>'ok']);

});
