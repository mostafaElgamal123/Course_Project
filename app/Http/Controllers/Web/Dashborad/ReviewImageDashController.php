<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Course;
use Storage;
use App\Http\Requests\Web\Dashborad\ReviewImageRequest;
use App\Http\Requests\Web\Dashborad\ReviewImageUpdateRequest;
class ReviewImageDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:reviewimage-list|reviewimage-create|reviewimage-edit|reviewimage-delete', ['only' => ['index','show']]);
         $this->middleware('permission:reviewimage-create', ['only' => ['create','store']]);
         $this->middleware('permission:reviewimage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:reviewimage-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review=Review::with('courses')->paginate(6);
        return view('web.dashborad.review_image.index',compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.review_image.create',[
            'course'=>Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ReviewImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewImageRequest $request)
    {
        $request->validated();
        if($request->hasFile('review_image')){
            $file= $request->file('review_image');
            $destination_path='images/review/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('review_image')->storeAs($destination_path,$filename);
            $review=Review::create($request->all());
            $review->review_image=$path;
            $review->save();
        }
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
        return view('web.dashborad.review_image.edit',[
            'review'=>Review::where('id',$id)->first(),
            'course'=>Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReviewImageUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewImageUpdateRequest $request,$id)
    {
        $review=Review::where('id',$id)->first();
        $request->validated();
        if($request->hasFile('review_image')){
            $file= $request->file('review_image');
            $destination_path='images/review/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('review_image')->storeAs($destination_path,$filename);
            if(Storage::delete($review->review_image)){
            $review->update($request->except('token'));
            $review->review_image=$path;
            $review->save();
            }else{
            $review->update($request->except('token'));
            $review->review_image=$path;
            $review->save();
           }
        }else{
            $review->update($request->except('token'));
            $review->save();
        }
        return redirect('reviewimages')->with('success','date updated successfully');
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
        if(Storage::delete($review->review_image)) {
            if($review->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $review->id
                ]);
            }
         }else{
            if($review->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $review->id
                ]);
            }
         }
    }
}
