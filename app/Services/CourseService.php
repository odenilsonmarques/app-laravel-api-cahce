<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    protected $repository;
    //contrusctor
    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function getCourses()
    {
        //recuperando todos os curso, que estão vindo do repository
        return $this->repository->getAllCourses();
    }
}