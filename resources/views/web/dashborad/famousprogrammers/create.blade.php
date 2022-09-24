@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','add famous programmers')

@section('content')

<a href="{{url('/famousprogrammers')}}" class="btn btn-info">
    view famous programmers
</a>

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/famousprogrammers')}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection