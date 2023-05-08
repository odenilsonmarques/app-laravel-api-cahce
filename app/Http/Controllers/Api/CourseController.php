<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;

    //contrusctor
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    
    public function index()
    {
        // acess method(getCourses())of class CourseServices. this method return course all
        $courses = $this->courseService->getCourses();

        return CourseResource::collection($courses);
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
