<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Http\Requests\StoreUpdateModule;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $moduleService;

    //contrusctor
    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }


    
    public function index($course)//foi declarado course como parametro porque esse vai ser passado na rota
    {
        //acess method getModules of class ModuleServices
        $modules = $this->moduleService->getModulesByCourse($course);
        
        return ModuleResource::collection($modules);
    }

    
    public function store(StoreUpdateModule $request, $course)
    {
        $module = $this->moduleService->createNewModule($request->validated());

        return new ModuleResource($module);
    }

}
