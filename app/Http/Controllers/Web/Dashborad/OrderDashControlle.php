<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;
use App\Models\City;
use Illuminate\Pipeline\Pipeline;
use App\Filters\StartAndEndFilter;
use App\Filters\CourseFilter;
use App\Filters\CityFilter;
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
    public function index(Request $request)
    {
        $order=app(Pipeline::class)
                ->send(Order::query())
                ->through([
                    StartAndEndFilter::class,
                    CourseFilter::class,
                    CityFilter::class,
                ])
                ->thenReturn()
                ->paginate(6); 

        return view('web.dashborad.orders.index',[
            'order'=>$order,
            'city'=>City::all(),
            'course'=>Course::all(),
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
