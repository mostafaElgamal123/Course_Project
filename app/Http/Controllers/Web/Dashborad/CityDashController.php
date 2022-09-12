<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Str;
class CityDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:city-list|city-create|city-edit|city-delete', ['only' => ['index','show']]);
         $this->middleware('permission:city-create', ['only' => ['create','store']]);
         $this->middleware('permission:city-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.dashborad.city.index',[
            'city'=>City::paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.city.create');
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
            'city'       =>'required|min:3|max:150',
            'slug'       =>'required|min:3|max:150'
        ]);
        $city=City::create($request->all());
        $city->slug=Str::of($request->slug)->slug('-');
        $city->save();
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
    public function edit($slug)
    {
        return view('web.dashborad.city.edit',[
            'city'=>City::where('slug',$slug)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        $city=City::where('slug',$slug)->first();
        $request->validate([
            'city'       =>'required|min:3|max:150',
            'slug'       =>'required|min:3|max:150'
        ]);
        $city->update($request->except('token'));
        $city->slug=Str::of($request->slug)->slug('-');
        $city->save();
        return redirect('cities')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $city=City::where('slug',$slug)->first();
       if($city->delete()){
        return response()->json([
            'success' => 'Record deleted successfully!',
            'id'      =>  $city->id
        ]);
        }
    }
}
