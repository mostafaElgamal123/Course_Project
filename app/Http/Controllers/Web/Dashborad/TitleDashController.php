<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Course;
use Storage;
use Illuminate\Support\Str;
use App\Http\Requests\Web\Dashborad\TitleRequest;
class TitleDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:title-list|title-create|title-edit|title-delete', ['only' => ['index','show']]);
         $this->middleware('permission:title-create', ['only' => ['create','store']]);
         $this->middleware('permission:title-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:title-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.dashborad.titles.index',[
            'title'=>Title::with('courses')->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.titles.create',[
            'course'=>Course::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitleRequest $request)
    {
        $request->validated();
        $title=Title::create($request->all());
        $title->slug=Str::of($request->slug)->slug('-');
        $title->save();
        return back()->with('success','date added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course=Course::where('slug',$slug)->first();
        return view('web.dashborad.titles.index',[
            'course'=>$course,
            'title'=>Title::where('course_id',$course->id)->paginate(6),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $title=Title::where('slug',$slug)->first();
        return view('web.dashborad.titles.edit',[
            'title'=>$title,
            'course'=>Course::where('id',$title->course_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TitleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TitleRequest $request,$slug)
    {
        $title=Title::where('slug',$slug)->first();
        $request->validated();
        $title->update($request->except('token'));
        $title->slug=Str::of($request->slug)->slug('-');
        $title->save();
        $course=Course::where('id',$title->course_id)->first();
        return view('web.dashborad.titles.index',[
            'course'=>$course,
            'title'=>Title::where('course_id',$course->id)->paginate(6),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $title=Title::where('slug',$slug)->first();
       if($title->delete()){
        return response()->json([
            'success' => 'Record deleted successfully!',
            'id'      =>  $title->id
        ]);
        }
    }
}
