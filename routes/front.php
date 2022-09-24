<?php

use App\Http\Controllers\Web\Front\{CourseController,OrderControlle};


Route::get('/', function () {
    return redirect()->route('course');
});

//course route
Route::get('course',[CourseController::class,'index'])->name('course');
Route::get('courses/{course}',[CourseController::class,'show']);

//Order
Route::post('orders',[OrderControlle::class,'store']);

//success
Route::get('success',function(){
    return view('web.front.success.success');
})->name('success');