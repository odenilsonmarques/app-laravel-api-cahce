<?php

namespace App\Observers;

use App\Models\Module;
use Illuminate\Support\Str;

class ModuleObserver
{
    /**
     * Handle the Course "creating" event.
     *
     * @param  \App\Models\Module  $course
     * @return void
     */
    public function creating(Module $module)
    {
        //antes de inserir um registro essa classe junto com esse metodo vão inserir um valor dinamico no campo uuid
        $module->uuid = (string) Str::uuid();
    }

}
