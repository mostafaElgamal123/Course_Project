@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','add city')

@section('content')

<a href="{{url('/cities')}}" class="btn btn-info">
    view cities
</a>

<div class="row pt-4 pb-4">
    
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/cities')}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            <div class="mb-3">
                <label class="form-label">city</label>
                <input type="text" name="city" value="{{old('city')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{old('slug')}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection