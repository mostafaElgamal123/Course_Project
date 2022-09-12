<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\Web\Front\OrderRequest;
class OrderControlle extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $request->validated();
        $order=Order::create($request->all());
        return response()->json(['success'=>'Thank you for Apply Now. we will contact you shortly.']);
    }
}
