<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseObserver
{
    /**
     * Handle the Course "creating" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        //antes de inserir um registro essa classe junto com esse metodo vão inserir um valor dinamico no campo uuid
        $course->uuid = (string) Str::uuid();
    }

}
