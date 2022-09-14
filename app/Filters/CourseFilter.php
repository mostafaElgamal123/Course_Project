<?php

namespace App\Filters;

use Closure;
use App\Models\Course;
class CourseFilter {
    public function handle($query,Closure $next){
        if(request()->has('course')){
            $query->where('course_id','LIKE', '%'.request()->input('course').'%');
        }
        return $next($query);
    }
}