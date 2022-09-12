@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('/cities')}}" class="btn btn-info">
    view cities
</a>

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/cities/'.$city->slug)}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">city</label>
                <input type="text" name="city" value="{{$city->city}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$city->slug}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection