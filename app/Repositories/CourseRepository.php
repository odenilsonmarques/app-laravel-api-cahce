<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;

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
        //return courses all. Nesse caso, como ha um relacionamento entre cursos e modulos, pode ser que essa consulta fique sobre carregada, pois pra cada module é feito uma query.(ver isso no telescoe)
        // return $this->entity->get(); 

        //nesse caso estou usando o recurso do eloquente para deixar a consulta mais leve, com mais peformance. 
        // return $this->entity->with('modules')->get(); 


        //guardando e consumindo dados em cache
        //1º verifica se tem um cache chamado courses(poderia ser outro nome, pois é apenas uma chave de identificação)a cada 60 segundo, se tiver não é realizado uma nova query, ou seja pega os dados em memoria(cache). Caso contrario, uma nova consulta ao banco é feita
        return Cache::remember('courses', 60, function (){

            return $this->entity->with('modules')->get(); 

        });



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