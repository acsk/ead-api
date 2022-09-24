<?php

namespace App\Repositories;

use App\Models\Module;

class  ModuleRepository{

    protected $entity;

    public function __construct(Module $Module)
    {
        $this->entity = $Module;
    }

    public function getAll(){

        return $this->entity->get();
    }
    public function getModule(string $uuid){

        return $this->entity->findOrFail($uuid);
    }

    public function getModulesCourseById($courseId){

        return $this
                   ->entity
                   ->with('lessons.views')
                   ->where('course_id', $courseId)->get();
    }
}
