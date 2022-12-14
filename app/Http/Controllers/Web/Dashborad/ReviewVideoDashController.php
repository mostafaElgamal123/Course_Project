<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Course;
use App\Http\Requests\Web\Dashborad\ReviewVideoRequest;
class reviewVideoDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:reviewvideo-list|reviewvideo-create|reviewvideo-edit|reviewvideo-delete', ['only' => ['index','show']]);
         $this->middleware('permission:reviewvideo-create', ['only' => ['create','store']]);
         $this->middleware('permission:reviewvideo-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:reviewvideo-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review=Review::with('courses')->paginate();
        return view('web.dashborad.review_video.index',compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.review_video.create',[
            'course'=>Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ReviewVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewVideoRequest $request)
    {
        $request->validated();
        $review=Review::create($request->all());
        return back()->with('success','date added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('web.dashborad.review_video.edit',[
            'review'=>Review::where('id',$id)->first(),
            'course'=>Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReviewVideoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewVideoRequest $request,$id)
    {
        $review=Review::where('id',$id)->first();
        $request->validated();
        $review->update($request->except('token'));
        return redirect('reviewvideos')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review=Review::where('id',$id)->first();
        if($review->delete()){
            return response()->json([
                'success' => 'Record deleted successfully!',
                'id'      =>  $review->id
            ]);
        }
    }
}
