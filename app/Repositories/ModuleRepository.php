<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected $entity;

    //contrusctor
    public function __construct(Module $module)
    {
        $this->entity = $module;
    }

    public function getModuleCourse(int $courseId)
    {
        return $this->entity->where('course_id', $this->entity)->get();
    }

    public function createNewModule(int $courseId, array $data)
    {
        $data['course_id'] = $courseId;
        return $this->entity->create($data);
    }
}