<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FamousProgrammer;
use Storage;
class FamousProgrammerDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:famousprogrammer-list|famousprogrammer-create|famousprogrammer-edit|famousprogrammer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:famousprogrammer-create', ['only' => ['create','store']]);
         $this->middleware('permission:famousprogrammer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:famousprogrammer-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $famousprogrammer=FamousProgrammer::paginate(6);
        return view('web.dashborad.famousprogrammers.index',compact('famousprogrammer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.famousprogrammers.create');
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
            'image' =>'image|mimes:webp|max:1000',
        ]);
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='images/famousprogrammer/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            $famousprogrammer=FamousProgrammer::create($request->all());
            $famousprogrammer->image=$path;
            $famousprogrammer->save();
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
        return view('web.dashborad.famousprogrammers.edit',[
            'famousprogrammer'=>FamousProgrammer::where('id',$id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\famousprogrammerUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(famousprogrammerUpdateRequest $request,$id)
    {
        $famousprogrammer=famousprogrammer::where('id',$id)->first();
        $request->validate([
            'image' =>'image|mimes:webp|max:1000',
        ]);
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='images/famousprogrammer/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            if(Storage::delete($famousprogrammer->image)){
            $famousprogrammer->update($request->except('token'));
            $famousprogrammer->image=$path;
            $famousprogrammer->save();
            }else{
            $famousprogrammer->update($request->except('token'));
            $famousprogrammer->image=$path;
            $famousprogrammer->save();
           }
        }else{
            $famousprogrammer->update($request->except('token'));
            $famousprogrammer->save();
        }
        return redirect('famousprogrammers')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $famousprogrammer=FamousProgrammer::where('id',$id)->first();
        if(Storage::delete($famousprogrammer->image)) {
            if($famousprogrammer->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $famousprogrammer->id
                ]);
            }
         }else{
            if($famousprogrammer->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $famousprogrammer->id
                ]);
            }
         }
    }
}
