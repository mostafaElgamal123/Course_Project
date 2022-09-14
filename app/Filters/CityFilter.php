<?php

namespace App\Filters;

use Closure;

class CityFilter {
    public function handle($query,Closure $next){
        if(request()->has('city')){
            $query->where('city_id','LIKE', '%'.request()->input('city').'%');
        }
        return $next($query);
    }
}