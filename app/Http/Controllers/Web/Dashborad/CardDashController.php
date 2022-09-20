<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Course;
use Storage;
use App\Http\Requests\Web\Dashborad\CardRequest;
class CardDashController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:card-list|card-create|card-edit|card-delete', ['only' => ['index','show']]);
         $this->middleware('permission:card-create', ['only' => ['create','store']]);
         $this->middleware('permission:card-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:card-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card=Card::with('courses')->paginate();
        return view('web.dashborad.card.index',compact('card'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.card.create',[
            'course'=>Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        $request->validated();
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='images/card/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            $card=Card::create($request->all());
            $card->image=$path;
            $card->save();
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
        return view('web.dashborad.card.edit',[
            'card'=>Card::where('id',$id)->first(),
            'course'=>Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CardRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request,$id)
    {
        $card=Card::where('id',$id)->first();
        $request->validated();
        if($request->hasFile('image')){
            $file= $request->file('image');
            $destination_path='images/card/';
            $filename=date('YmdHi').$file->getClientOriginalName();
            $path =$request->file('image')->storeAs($destination_path,$filename);
            if(Storage::delete($card->image)){
            $card->update($request->except('token'));
            $card->image=$path;
            $card->save();
            }else{
            $card->update($request->except('token'));
            $card->image=$path;
            $card->save();
           }
        }else{
            $card->update($request->except('token'));
            $card->save();
        }
        return redirect('cards')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card=Card::where('id',$id)->first();
        if(Storage::delete($card->image)) {
            if($card->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $card->id
                ]);
            }
         }else{
            if($card->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $card->id
                ]);
            }
         }
    }
}
