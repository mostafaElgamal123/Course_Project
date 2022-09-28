<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\City;
use App\Models\ChangeConstant;
use App\Models\FamousProgrammer;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.front.courses.index',[
            'course'=>Course::with('categories','orders')->where('status','publish')->paginate(6)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course=Course::with('titles','faqs','reviews','cards')->where('slug',$slug)->firstOrFail();
        $review_video=[];
        $review_image=[];
        foreach($course->reviews as $review){
            if($review->review_video){
                $review_video[]=$review;
            }else{
                $review_image[]=$review;
            }
        }
        $city=City::all();
        $famousprogrammer=FamousProgrammer::all();
        $changeconstant=ChangeConstant::first();
        return view('web.front.single.single',compact('course','city','changeconstant','famousprogrammer','review_image','review_video'));
    }
}
