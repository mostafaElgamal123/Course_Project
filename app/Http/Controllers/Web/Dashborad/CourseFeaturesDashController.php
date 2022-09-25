<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseFeature;
use App\Models\Course;
class CourseFeaturesDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:coursefeature-list|coursefeature-create|coursefeature-edit|coursefeature-delete', ['only' => ['index','show']]);
         $this->middleware('permission:coursefeature-create', ['only' => ['create','store']]);
         $this->middleware('permission:coursefeature-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:coursefeature-delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.dashborad.coursefeatures.index',[
            'coursefeature'=>CourseFeature::with('courses')->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course=Course::all();
        return view('web.dashborad.coursefeatures.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'             =>'required|min:3|max:10000',
            'description'       =>'required|min:3|max:10000',
            'course_id'         =>'required'
        ]);
        $coursefeature=CourseFeature::create($request->all());
        return back()->with('success','date added successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseFeature $coursefeature)
    {
        return view('web.dashborad.coursefeatures.edit',[
            'coursefeature'=>$coursefeature,
            'course'       =>Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseFeature $coursefeature)
    {
        $request->validate([
            'title'             =>'required|min:3|max:10000',
            'description'       =>'required|min:3|max:10000',
            'course_id'         =>'required'
        ]);
        $coursefeature->update($request->except('token'));
        return redirect('coursefeatures')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseFeature $coursefeature)
    {
       if($coursefeature->delete()){
        return response()->json([
            'success' => 'Record deleted successfully!',
            'id'      =>  $coursefeature->id
        ]);
        }
    }
}
