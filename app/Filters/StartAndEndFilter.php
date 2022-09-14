<?php

namespace App\Filters;

use Closure;

class StartAndEndFilter {
    public function handle($query,Closure $next){
        if(request()->has('start')&&request()->has('end')){
            if(request()->input('start')!=request()->input('end')){
              $query->whereBetween('order_date',[date(request()->input('start')), date(request()->input('end'))]);
            }else{
                $query->where('order_date', 'LIKE', '%'.date(request()->input('start')).'%');
            }
        }
        return $next($query);
    }
}