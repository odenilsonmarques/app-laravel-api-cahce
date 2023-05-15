<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $entity;

    //contrusctor
    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return $this->entity->get(); //return courses all
    }

    public function createCourse(Array $data)
    {
        return $this->entity->create($data);
    }

    public function getCourseByUuid($identity)
    {
        return $this->entity->where('uuid', $identity)->firstOrFail();//esse metoho firstOrFail() retorna o primeiro registro, caso nao encontre retorna 404
    }

    public function deleteCourseByUuid(string $identity)
    {
        $course = $this->getCourseByUuid($identity);

        return $course->delete();
    }

    public function updateCourseByUuid(string $identify, array $data)
    {
        //recuperando o curso a ser editado
        $course = $this->getCourseByUuid($identify);

        return $course->update($data);
    }
}