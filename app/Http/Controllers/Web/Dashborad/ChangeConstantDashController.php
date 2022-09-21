<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChangeConstant;
use App\Models\Course;
use App\Http\Requests\Web\Dashborad\ChangeConstantRequest;
class ChangeConstantDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:changeconstant-list|changeconstant-create|changeconstant-edit|changeconstant-delete', ['only' => ['index','show']]);
         $this->middleware('permission:changeconstant-create', ['only' => ['create','store']]);
         $this->middleware('permission:changeconstant-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:changeconstant-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course=Course::all();
        $changeconstant=ChangeConstant::all();
        if($changeconstant->count()<=0){
            return view('web.dashborad.changeconstant.index',compact('changeconstant','course'));
        }else{
            $course=Course::all();
            $changeconstant=ChangeConstant::first();
            return view('web.dashborad.changeconstant.update',compact('changeconstant','course'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ChangeConstantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChangeConstantRequest $request)
    {
        $course=Course::all();
        $request->validated();
        $changeconstant=ChangeConstant::create($request->all());
        return view('web.dashborad.changeconstant.update',compact('changeconstant','course'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ChangeConstantRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChangeConstantRequest $request,ChangeConstant $changeconstant)
    {
        $course=Course::all();
        $request->validated();
        $changeconstant->update($request->all());
        return view('web.dashborad.changeconstant.update',compact('changeconstant','course'));
    }
}
