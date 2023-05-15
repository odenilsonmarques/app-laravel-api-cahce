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

    public function createNewCourse(Array $data) //recebendo um array com dados($data) a serem cadastrados, lembrando que esse cadastro assim com um list fica no repository
    {
        return $this->repository->createCourse($data);
    }

    public function getCourse(string $identify)
    {
        return $this->repository->getCourseByUuid($identify);
    }

    public function deleteCourse(string $identify)//recebendo o identificador do curso
    {
        return $this->repository->deleteCourseByUuid($identify);
    }

    public function updateCourse(string $identify, array $data)//recebendo o identificador do curso, e  um array com os dados para atualizar
    {
        return $this->repository->updateCourseByUuid($identify, $data);
    }
}