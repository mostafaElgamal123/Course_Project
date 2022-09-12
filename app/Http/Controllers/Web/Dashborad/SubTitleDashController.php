<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\SubTitle;
use Storage;
use Illuminate\Support\Str;
class SubTitleDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:subtitle-list|subtitle-create|subtitle-edit|subtitle-delete', ['only' => ['index','show']]);
         $this->middleware('permission:subtitle-create', ['only' => ['create','store']]);
         $this->middleware('permission:subtitle-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:subtitle-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.dashborad.subtitles.index',[
            'subtitle'=>SubTitle::with('titles')->paginate(6),
        ]);
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
            'subtitle'              =>'required|min:3|max:200',
        ]);
        $subtitle= new SubTitle();
        $subtitle->subtitle=$request->subtitle;
        $subtitle->title_id=$request->title_id;
        $subtitle->save();
        return response()->json(['success'=>'date added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $title=Title::where('slug',$slug)->first();
        return response()->json([
            'title'   =>$title->title,
            'subtitle'=>SubTitle::where('title_id',$title->id)->get()
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $subtitle=SubTitle::where('id',$id)->first();
       if($subtitle->delete()){
        return response()->json([
            'success' => 'Record deleted successfully!',
            'id'      =>  $subtitle->id
        ]);
        }
    }
}
