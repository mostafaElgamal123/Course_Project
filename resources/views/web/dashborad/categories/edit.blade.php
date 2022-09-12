@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('/categories')}}" class="btn btn-info">
    view categories
</a>

<div class="row pt-4 pb-4">
    <div class="col-xl-8 col-12 mx-auto">
        <form class="style_form" action="{{url('/categories/'.$category->slug)}}" method="post" enctype="multipart/form-data">
        @include('web.dashborad.layout.message')
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">slug</label>
                <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection