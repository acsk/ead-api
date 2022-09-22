<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseController extends Controller
{
   public function index(){

    $courses = Course::all();

    return CourseResource::collection($courses);

   }
}
