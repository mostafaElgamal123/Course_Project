<?php

namespace App\Filters;

use Closure;
use App\Models\Course;
class CourseFilter {
    public function handle($query,Closure $next){
        if(request()->has('course')){
            $course=Course::where('title',request()->input('course'))->first();
            $query->where('course_id','LIKE', '%'.$course->id.'%');
        }
        return $next($query);
    }
}