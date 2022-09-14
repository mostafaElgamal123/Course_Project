<?php

namespace App\Filters;

use Closure;

class StartFilter {
    public function handle($query,Closure $next){
        if(request()->has('start')){
            $query->where('order_date', 'LIKE', '%'.date(request()->input('start')).'%');
        }
        return $next($query);
    }
}