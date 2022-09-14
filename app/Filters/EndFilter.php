<?php

namespace App\Filters;

use Closure;

class EndFilter {
    public function handle($query,Closure $next){
        if(request()->has('end')){
            $query->where('order_date', 'LIKE', '%'.date(request()->input('end')).'%');
        }
        return $next($query);
    }
}