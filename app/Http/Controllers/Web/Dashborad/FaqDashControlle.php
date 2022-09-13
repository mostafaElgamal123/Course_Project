<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Course;
use Storage;
use App\Http\Requests\Web\Dashborad\FaqRequest;
class FaqDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete', ['only' => ['index','show']]);
         $this->middleware('permission:faq-create', ['only' => ['create','store']]);
         $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq=Faq::with('courses')->paginate(6);
        return view('web.dashborad.faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.faq.create',[
            'course'=>Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $request->validated();
        $faq=faq::create($request->all());
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
     *7
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('web.dashborad.faq.edit',[
            'faq'=>Faq::where('id',$id)->first(),
            'course'=>Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FaqRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request,$id)
    {
        $faq=Faq::where('id',$id)->first();
        $request->validated();
        $faq->update($request->all());
        return redirect('faqs')->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq=Faq::where('id',$id)->first();
            if($faq->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $faq->id
                ]);
            }
    }
}
