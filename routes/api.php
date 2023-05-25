<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController
};


// use App\Http\Controllers\FilterReleaseController;

use Illuminate\Support\Facades\Route;

//-----------Routes for Course-----------------

//route for all courses search 
Route::get('/courses', [CourseController::class,'index']);

//route for create new course
Route::post('/courses', [CourseController::class, 'store']);

//route for course search by uuid
Route::get('/courses/{identify}', [CourseController::class, 'show']);

//route for course delete
Route::delete('/courses/{identify}', [CourseController::class, 'destroy']);

//route for edit data
Route::put('/courses/{identify}', [CourseController::class, 'update']);


//-----------Routes for Modulues-----------------


//passando na rota o curso e os modulos ligado a esse curso. Onde tem {course} é o nome do curso a ser passa na rota seguido do modulo
Route::apiResource('/courses/{course}/modules',ModuleController::class);








Route::get('/', function(){
    //response do tipo json
    return response()->json(['message'=>'ok']);

});
