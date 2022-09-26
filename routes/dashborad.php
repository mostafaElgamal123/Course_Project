<?php
use App\Http\Controllers\Web\Dashborad\{FamousProgrammerDashController,CardDashController,ChangeConstantDashController,DashboradController,CategoryDashController,CourseDashController,TitleDashController,SubTitleDashController,OrderDashControlle,FaqDashControlle,ReviewImageDashController,ReviewVideoDashController,CityDashController};
use App\Http\Controllers\{RoleControlle,UserController};
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    //dashborad route
    Route::get('/dashboard',[DashboradController::class,'index'])->name('dashborad');
    Route::resource('/roles', RoleControlle::class);
    Route::resource('/users', UserController::class);
    Route::resource('/categories',CategoryDashController::class);
    Route::resource('/courses',CourseDashController::class);
    Route::resource('/titles',TitleDashController::class);
    Route::resource('/subtitles',SubTitleDashController::class);
    Route::resource('/orders',OrderDashControlle::class);
    Route::resource('/faqs',FaqDashControlle::class);
    Route::resource('/reviewimages',ReviewImageDashController::class);
    Route::resource('/reviewvideos',ReviewVideoDashController::class);
    Route::resource('/cities',CityDashController::class);
    Route::resource('/changeconstants',ChangeConstantDashController::class);
    Route::resource('/cards',CardDashController::class);
    Route::get('/testshowone',[CourseDashController::class,'test']);
    Route::resource('/famousprogrammers',FamousProgrammerDashController::class);
});

