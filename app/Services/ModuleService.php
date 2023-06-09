<?php

namespace App\Services;

use App\Repositories\{
    ModuleRepository,
    CourseRepository

};

class ModuleService
{
    protected $repository, $courseRepository;

    //nesse contrusctor, foi passado o o repository do curso para poder pegar um curso e seus modulo no metodo index
    public function __construct(ModuleRepository $moduleRepository, CourseRepository $courseRepository)
    {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse(string $course)
    {
        //recuperando o curso
        $course = $this->courseRepository->getCourseByUuid($course);
        return $this->moduleRepository->getModuleCourse($course->id);
    }



    public function createNewModule(array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);
        return $this->moduleRepository->createNewModule($course->id, $data);
    }
}