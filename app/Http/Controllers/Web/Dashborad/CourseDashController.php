<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Order;
use App\Http\Requests\Web\Dashborad\CourseRequest;
use App\Http\Requests\Web\Dashborad\CourseUpdateRequest;
use Storage;
use Illuminate\Support\Str;
class CourseDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);
         $this->middleware('permission:course-create', ['only' => ['create','store']]);
         $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.dashborad.courses.index',[
            'course'=>Course::with('categories')->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('web.dashborad.courses.create',[
            'category'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $request->validated();
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='/images/course/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            $course=Course::create($request->all());
            $course->image= $path;
            $course->slug=Str::of($request->slug)->slug('-');
            $course->save();
        }
        return back()->with('success','date added successfully');
    }

     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('web.dashborad.courses.edit',[
            'course'=>Course::where('slug',$slug)->first(),
            'category'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CourseUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request,$slug)
    {
        $course=Course::where('slug',$slug)->first();
        // Retrieve the validated input data...
        $request->validated();
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='/images/course/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            if(file_exists($course->image)){
                if(Storage::delete($course->image)){
                $course->update($request->all());
                $course->image= $path;
                $course->slug=Str::of($request->slug)->slug('-');
                $course->save();
                }
            }else{
                $course->update($request->all());
                $course->image= $path;
                $course->slug=Str::of($request->slug)->slug('-');
                $course->save();
            }
        }else{
            $course->update($request->all());
            $course->slug=Str::of($request->slug)->slug('-');
            $course->save();
        }
        return redirect('courses')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $course=Course::where('slug',$slug)->first();
        if(Storage::delete($course->image)) {
            if($course->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $course->id
                ]);
            }
         }
    }
}
