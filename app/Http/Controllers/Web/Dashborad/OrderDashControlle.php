<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;
use App\Models\City;
class OrderDashControlle extends Controller
{
    function __construct()
    {
         $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','show']]);
         $this->middleware('permission:order-create', ['only' => ['create','store']]);
         $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::with('courses')->paginate(6);
        return view('web.dashborad.orders.index',[
            'order'=>Order::with('courses')->paginate(6),
        ]);
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
        return view('web.dashborad.courses.show-order',[
            'order'=>Order::where('course_id',$course->id)->paginate(6),
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
        $order=Order::where('id',$id)->first();
            if($order->delete()){
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'id'      =>  $order->id
                ]);
            }
    }
}
